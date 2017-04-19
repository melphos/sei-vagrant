################################################################################
# Dockerfile de construção do container WebApp utilizado pelo SEI e pelo SIP
#
# Container preparado e configurado para uso em desenvolvimento e testes
################################################################################

#TODO: Migrar para container oficial do PHP 5.6 (5.6-alpine)
FROM centos:centos6
MAINTAINER Guilherme Andrade Del Cantoni <guilherme.cantoni@planejamento.gov.br>, Ivan Santos <ivan.santos@centralit.com.br>

############################# INÍCIO DA INSTALAÇÃO #############################
ENV TERM xterm

# Instalação do SEI e demais componentes acessórios
COPY install.sh /install.sh
COPY entrypoint.sh /entrypoint.sh

RUN bash /install.sh

# Configuração dos parâmetros do SEI e SIP
COPY assets/LEIAME.txt /var/www/html/
COPY assets/sei.ini /etc/php.d/sei.ini
COPY assets/xdebug.ini /etc/php.d/xdebug.ini
COPY assets/sei.conf /etc/httpd/conf.d/sei.conf
COPY assets/ConfiguracaoSip.php /ConfiguracaoSip.php
COPY assets/ConfiguracaoSEI.php /ConfiguracaoSEI.php

# Configuração do Gearman e Supervisor, componentes necessários para a
# integração do SEI com Processo Eletrônico Nacional
COPY assets/supervisord.conf /etc/supervisord.conf

##################### FIM DA INSTALAÇÃO #####################

EXPOSE 80
CMD ["/entrypoint.sh"]
