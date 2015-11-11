<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Actionable emails e.g. reset password</title>
<link href="{{asset('../css/email.css')}}" rel="stylesheet">
    </head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction">
					<tr>
						<td class="content-wrap">
							<meta itemprop="name" content="Confirm Email"/>
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr class="content-block">
									<td>
										Estimado(a) {{$name}}: {{$msn}}
									</td>
								</tr>
								<tr>
									<td class="content-block">
										
										Le informamos que su registro fue exitoso, gracias por preinscribirse al evento más importante de ciencias de la computación "CCBOL-2015", ahora necesita validar su registro, siguiendo los siguientes pasos:


									</td>
								</tr>
								<tr>
									<td class="content-block">
										<ul>
											<li>
												Realice el depósito de {{$monto}}  Bs. hasta el 10 de noviembre de 2015, a partir de esta fecha de {{$montod}} Bs. en la cuenta Nº <b>1-6714592</b> del <b>BANCO UNION S.A.</b>
											</li>
											<li>
												Con la cuenta registrada ingrese por este enlace  <a href="http://181.188.190.82/inicio-de-sesion">Login</a> y registre el comprobante de deposito (escaneado).

											</li>
											<li>
												Inscripción finalizada. En caso de existir observaciones revise su bandeja de entrada en las próximas horas.
											</li>
										</ul>
										

									</td>
								</tr>
								<tr>
									<td class="content-block">
										<p>
											Muchas gracias y te esperamos en la ciudad de potosí.
										</p>
									</td>

								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<a href="http://twitter.com/mail_gun">ccbol2015@gmail.com</a>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>