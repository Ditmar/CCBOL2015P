var csrftoken =  (function() {
    // not need Jquery for doing that
    var metas = window.document.getElementsByTagName('meta');

    // finding one has csrf token 
    for(var i=0 ; i < metas.length ; i++) {

        if ( metas[i].name === "csrf-token") {

            return  metas[i].content;       
        }
    }  

})();
(function(){
	"use strict";
	var angularapp=angular.module("admin",['ngResource'],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');

    })
    .constant("CSRF_TOKEN",csrftoken)
	.factory('listas',function($resource){
		return $resource("/admin/dashboard/list/:id");
	})
	.factory('Acreditar',function($resource){
		return $resource("/admin/participante/AgreditarParticipante");
	})
	.factory('Observar',function($resource){
		return $resource("/admin/participante/Observar");
	})
	.factory('Editar',function($resource){
		return $resource("/admin/participante/editardatos");
	})
	.factory('Buscar',function($resource){
		return $resource("/admin/participante/buscar/:id");
	})
	.factory('checkdepo',function($resource){
		return $resource("/admin/participante/depo/:id");
	})
	.controller('MainController',function($scope,listas,Acreditar,CSRF_TOKEN,Observar,Editar,Buscar,checkdepo){
		$scope.title="CCBOL 2015 Admin";
		$scope.menu=[ 
		{label:"P. en Proceso",action:"proceso"},
		{label:"P. Inscritos",action:"correcto"},
		{label:"P. Observados",action:"observado"},
		{label:"Todos",action:"all"}];
		var borrarLista=function(id)
		{
			for(var i=0;i<$scope.lista.length;i++)
			{
				if($scope.lista[i].id===id)
				{
					 $scope.lista.splice(i,1);
				}
			}
		}
		//buscador
		$scope.buscardb=function(label)
		{
			//var labeltxt=$("#searchbox").val();
			console.log(label.txt)
			Buscar.get({id:label.txt},function(r){
				console.log(r);
				$scope.auxlist=r.participante;
				$scope.stats=r.stats;
				$scope.lista=r.participante;
				$scope.mensajes="Lista Cargada";
			});
		}
		$scope.keyupdatasearch=function(e)
		{
			var labeltxt=$("#searchbox").val();
			var mayus=labeltxt.toUpperCase();
			var listar=Array();
			for(var i=0;i<$scope.auxlist.length;i++)
			{
				var ci=$scope.auxlist[i].ci.toUpperCase();
				var nombres=$scope.auxlist[i].nombres.toUpperCase();
				var apellidos=$scope.auxlist[i].apellidos.toUpperCase();
				if(ci.indexOf(mayus)>-1  | nombres.indexOf(mayus)>-1| apellidos.indexOf(mayus)>-1)
				{
					listar.push($scope.auxlist[i]);
				}
				$scope.lista=listar;
			}
		}
		$scope.enviarObservacion=function(observacion)
		{
			var obs=new Observar();
			obs.id=observacion.id;
			obs.nombre=observacion.nombre;
			obs.email=observacion.email;
			obs.message=observacion.message;
			obs.$save(function(r){
				alert("Observación Realizada con éxito, se envio un email explicando la razón de su observación");
				$('#modal-ob').modal('hide');
				borrarLista(obs.id);
			});
		}
		$scope.observar=function(information)
		{
			//console.log(information);
			$scope.observacion={id:information.id,nombre:information.nombres,email:information.emails};
			$("#modal-ob").modal("show");
		}
		$scope.imgload=function(id)
		{
			$( ".zoomContainer" ).remove();
			$(".zoomContainer").css({
				"z-index":99999
			});
			$("#zoom"+id).elevateZoom({scrollZoom : true,cursor: "crosshair"});	
		}
		$scope.acreditar=function(id)
		{
			//rescatamos las varaibles
		 	var depcode=$scope.estracto;
		 	if(depcode.length==1)
		 	{
		 		var obj={"id":id,"code":depcode[0].code,"_token":CSRF_TOKEN};	
		 	}else
		 	{
		 		var obj={"id":id,"code":0,"_token":CSRF_TOKEN};
		 	}
			var acre=new Acreditar();
			acre.id=id;
			acre.code=obj.code;
			acre._token=CSRF_TOKEN;
			$("#acreditarbtn").html("Acreditarndo al participante, Enviando Mails ...")
			$("#acreditarbtn").attr({
				"disabled":true
			});
			acre.$save(function(){
				alert("Participante Acreditado")
				$("#acreditarbtn").html("Acreditar");
				$("#acreditarbtn").attr({
				"disabled":false
			});
				$('#modal-id').modal('hide');
				borrarLista(id);
			});
		}
		$scope.editconfirmed=function(Edit)
		{
			var editarparticipante=new Editar();
			editarparticipante.id=Edit.id;
			editarparticipante.ci=Edit.ci;
			editarparticipante.email=Edit.email;
			editarparticipante.password=Edit.password;
			editarparticipante.idUs=Edit.idUs;
			$("#editbtn").html("Enviando...");
			$("#editbtn").attr({
				"disabled":true
			});
			editarparticipante.$save(function(){
				alert("Se Cambiarón las crdenciales correctamente");
				$("#editbtn").html("Enviar");
				$("#editbtn").attr({
					"disabled":false
				});
				$('#modal-editar').modal('hide');
			});
		}
		//funciones de interfaz
		$scope.editarUsuario=function(information)
		{
			$scope.edit={
				id:information.id,
				ci:information.ci,
				email:information.emails,
				idUs:information.idUs
			};

			$("#modal-editar").modal('show');
		}
		$scope.setLista=function(m)
		{
			$scope.tipo=m;
			$scope.mensajes="Cargando Listas Espere Porfavor";
			listas.get({id:m.action},function(r){
				$scope.auxlist=r.participante;
				$scope.stats=r.stats;
				$scope.lista=r.participante;
				$scope.mensajes="Lista Cargada";
			})
		}
		$scope.validate=function(item)
		{
			$scope.information=item;
			var depositos=item.depo;
			for(var i=0;i<depositos.length;i++)
			{
				//mandar a la db para verificar su deposito
				checkdepo.get({id:depositos[i].codigo},function(r){
					$scope.estracto=r.data;
				})
			}

			$('#modal-id').modal('show');
			//activamos algunnos plugins
		}
		listas.get({id:"proceso"},function(r){
			$scope.auxlist=r.participante;
			$scope.stats=r.stats;
			$scope.lista=r.participante;
		});

	});
})();