<?

class ConfiguracaoSip extends InfraConfiguracao  {

 	private static $instance = null;

 	public static function getInstance(){
 	  if (ConfiguracaoSip::$instance == null) {
 	    ConfiguracaoSip::$instance = new ConfiguracaoSip();
 	  }
 	  return ConfiguracaoSip::$instance;
 	}

 	public function getArrConfiguracoes(){
 	  return array(
 	      'Sip' => array(
 	          'URL' => 'https://sei-homolog.anac.gov.br/sip',
 	          'Producao' => false),
 	       
 	      'PaginaSip' => array('NomeSistema' => 'SIP'),

 	      'SessaoSip' => array(
 	          'SiglaOrgaoSistema' => 'ANAC',
 	          'SiglaSistema' => 'SIP',
 	          'PaginaLogin' => 'https://sei-homolog.anac.gov.br/sip/login.php',
 	          'SipWsdl' => 'http://sei-homolog.anac.gov.br/sip/controlador_ws.php?servico=wsdl',
 	          'https' => true),
 	       

              'BancoSip'  => array(
                  'Servidor' => 'sdbdf1006',
                  'Porta' => '1433',
                  'Banco' => 'SIP_3_0',
                  'Usuario' => 'usr_sei_3.0_app',
                  'Senha' => 'sei@3.0',
                  'Tipo' => 'SqlServer'), //MySql, SqlServer ou Oracle


				'CacheSip' => array('Servidor' => 'memcached',
						                'Porta' => '11211'),

 	      'HostWebService' => array(
 	          'Replicacao' => array('*'), //endere�o ou IP da m�quina que implementa o servi�o de replica��o de usu�rios
 	          'Pesquisa' => array('*'), //endere�os/IPs das m�quinas do SEI
 	          'Autenticacao' => array('89afbfda3ccb','10.42.170.21','localhost','sei-homolog.anac.gov.br','127.0.0.1','10,161.50.129','10.42.0.1','*.anac.gov.br')), //endere�os/IPs das m�quinas do SEI

				'InfraMail' => array(
						'Tipo' => '2', //1 = sendmail (neste caso n�o � necess�rio configurar os atributos abaixo), 2 = SMTP
						'Servidor' => 'smtp',
						'Porta' => '1025',
						'Codificacao' => '8bit', //8bit, 7bit, binary, base64, quoted-printable
						'MaxDestinatarios' => 999, //numero maximo de destinatarios por mensagem
						'MaxTamAnexosMb' => 999, //tamanho maximo dos anexos em Mb por mensagem
						'Seguranca' => 'TLS', //TLS, SSL ou vazio
						'Autenticar' => false, //se true ent�o informar Usuario e Senha
						'Usuario' => '',
						'Senha' => '',
						'Protegido' => 'desenv@instituicao.gov.br' //campo usado em desenvolvimento, se tiver um email preenchido entao todos os emails enviados terao o destinatario ignorado e substitu�do por este valor (evita envio incorreto de email)
				)
 	  );
 	}
}

