(function(){
	"use strict";
	angular.module("admin",['ngResource'])
	.factory('listas',function($resource){
		return $resource("/admin/dashboard/list/:id");
	})
	.controller('MainController',function($scope,listas){
		$scope.title="CCBOL 2015 Admin";
		$scope.menu=[ 
		{label:"P. en Proceso",action:"proceso"},
		{label:"P. Inscritos",action:"correcto"},
		{label:"P. Observados",action:"observado"},
		{label:"Todos",action:"all"}];
		$scope.imgload=function(id)
		{

			$("#zoom"+id).elevateZoom({scrollZoom : true,cursor: "crosshair"});
			//console.log($("#"+id));
			
		}
		//funciones de interfaz
		$scope.setLista=function(m)
		{
			listas.get({id:m.action},function(r){
				$scope.lista=r.participante;
			})
		}
		$scope.validate=function(item)
		{
			//console.log(item);
			$scope.information=item;
			$('#modal-id').modal('show');
			//activamos algunnos plugins

		}
		listas.get({id:"proceso"},function(r){
			$scope.lista=r.participante;
		});

	});
	
})();