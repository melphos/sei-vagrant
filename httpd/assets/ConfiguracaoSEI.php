<?

class ConfiguracaoSEI extends InfraConfiguracao  {

 	private static $instance = null;

 	public static function getInstance(){
 	  if (ConfiguracaoSEI::$instance == null) {
 	    ConfiguracaoSEI::$instance = new ConfiguracaoSEI();
 	  }
 	  return ConfiguracaoSEI::$instance;
 	}

 	public function getArrConfiguracoes(){
 	  return array(

 	      'SEI' => array(
 	          'URL' => 'https://sei-homolog.anac.gov.br/sei',
 	          'Producao' => false,
 	          'RepositorioArquivos' => '/var/sei/arquivos'),

 	      'PaginaSEI' => array(
 	          'NomeSistema' => 'SEI',
 	          'NomeSistemaComplemento' => SEI_VERSAO,
 	          'LogoMenu' => ''),
 	       
 	      'SessaoSEI' => array(
 	          'SiglaOrgaoSistema' => 'ANAC',
 	          'SiglaSistema' => 'SEI',
 	          'PaginaLogin' => 'https://sei-homolog.anac.gov.br/sip/login.php',
 	          'SipWsdl' => 'http://sei-homolog.anac.gov.br/sip/controlador_ws.php?servico=wsdl',
 	          'https' => true),
 	       

 	      'BancoSEI'  => array(
 	          'Servidor' => 'sdbdf1006',
 	          'Porta' => '1433',
 	          'Banco' => 'SEI_3_0',
 	          'Usuario' => 'usr_sei_3.0_app',
 	          'Senha' => 'sei@3.0',
 	          'Tipo' => 'SqlServer'), //MySql, SqlServer ou Oracle

				'CacheSEI' => array('Servidor' => 'memcached',
					                	'Porta' => '11211'),

 	      'JODConverter' => array('Servidor' => 'http://jod:8080/converter/service'),

 	      'Edoc' => array('Servidor' => 'http://[Servidor .NET]'),
 	       
 	      'Solr' => array(
 	          'Servidor' => 'http://solr:8983/solr',
 	          'CoreProtocolos' => 'sei-protocolos',
 	          'CoreBasesConhecimento' => 'sei-bases-conhecimento',
 	          'CorePublicacoes' => 'sei-publicacoes'),

				'HostWebService' => array(
						'Edoc' => array('[Servidor .NET]'),
						'Sip' => array('localhost','sei-homolog.anac.gov.br','127.0.0.1','10,161.50.129','10.161.50.*','10.42.*.*'), //Refer�ncias (IP e nome na rede) de todas as m�quinas que executam o SIP.
						'Publicacao' => array('*'), //Refer�ncias (IP e nome na rede) das m�quinas de ve�culos de publica��o externos cadastrados no SEI.
						'Ouvidoria' => array('*'), //Refer�ncias (IP e nome na rede) da m�quina que hospeda o formul�rio de Ouvidoria personalizado. Se utilizar o formul�rio padr�o do SEI, ent�o configurar com as m�quinas dos n�s de aplica��o do SEI.
				),
 	       
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

