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
										Querido {{$name}}:
									</td>
								</tr>
								<tr>
									<td class="content-block">
										 
										Le informamos que su registro fue exitoso, gracias por preinscribirte al evento mas grande de ciencias de la computación "CCBOL", ahora necesitas validar tu registro, siguiendo los siguientes pasos.


									</td>
								</tr>
								<tr>
									<td class="content-block">
										<ul>
											<li>
												Realiza el deposito de 250 Bs si es antes del 31 de octubre, 300 en caso de ser después del 31 de octubre, en la siguiente cuenta <b>1-6714592</b>, <b>BANCO UNION S.A.</b>
											</li>
											<li>
												Con la cuenta registrada ingresa por este enlace  <a href="http://ccbol2015.com.bo/inicio-de-sesion">Login</a> y registra la papeleta del comprobante del deposito.

											</li>
											<li>
												En 24 horas una vez realizado el deposito tu inscripción finalizara.
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