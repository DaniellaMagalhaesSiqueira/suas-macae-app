<<<<<<< HEAD
Sistema de gerenciamento de unidades do SUAS em Macaé Padrão MVC O sistema foi criado para dar início ao processo de digitalização dos dados no setor da Assistência Social no município de Macaé-RJ . Os serviços sócio-assistenciais precisam ser quantificados para que se possa realizar diagnóstico sócio-territorial. Os serviços também são controlados pelo Governo Federal que solicita informações quantitativas para que sejam criadas estratégias de atendimento à população.

A linguagem escolhida foi a PHP, pois foi informado que a equipe do município trabalha com essa linguagem. Espera-se sensibilizar gestores no processo de melhoria do armazenamento de dados. A ferramenta também tem o intuito de facilitar o trabalho do técnico de nível superior no registro de informações, organização de sua rotina e auxílio do diagnóstico de território. 

O sistema foi iniciado em outro repositório com objetivo de estudo na linguagem Java e interrompido para a mudança de linguagem e alteração para modalidade web. 



Seguem algumas telas do protótipo disponibilizado no período de 29 de junho de 2021 a 02 de setembro de 2021 para teste do referido município.

<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/tela_login_cras.png" style="zoom:25%;" />

A tela de login já conta com sistema de verificação de senha de um usuário mestre inserido previamente no banco de dados que irá inserir outros usuários do sistema que dependendo do seu nível de acesso podem inserir outros usuários. O sistema já cria a primeira senha com o CPF do usuário criado e o direciona em seu primeiro login à tela de edição de senha de usuário.

<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/editar_usuario.png" style="zoom:25%;" />

Passando o mouse pelo nome de usuário no canto superior direito temos um menu dropdown para deslogar e para editar a senha. Outras informações do usuário apenas o usuário com nível de acesso correto poderá alterar.
<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/usuario_dropdown.png"/>
Home:


<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/home.png" style="zoom:25%;" />

Alguns menus dropdown:

<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/familia_dropdown.png"/>
<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/pessoa_dropdown.png"/>
<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/tecnico_dropdown.png"/>
<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/vd_dropdown.png"/>
Formulário de inclusão de família:
<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/form_familia1.png"/>
<img src="https://github.com/DaniellaMagalhaesSiqueira/suas-macae-app/blob/master/public/assets/images/form_familia2.png"/>

O sistema já tem um banco de dados criado na pasta extras. Esse banco de dados foi idealizado conforme as solicitações de profissionais da assistência e necessidades de captação de dados específicos.

O sistema também foi pensado para que evoluísse para um sistema completo de gerenciamento de todas as unidades da Assistência Social além dos CRAS, como CREAS, Centros POP, Abrigos e o que mais precisar. Para isso seria preciso apenas gerenciar o banco e incluir funcionalidades ao sistema atual. 

O sistema já possui uma pesquisa para o Relatório Mensal de Atendimento e com apenas inclusão do mês e da renda per capita de extrema pobreza é possível obter todas as informações que este relatório específico necessita. Essas informações estão baseadas nos dados inseridos pelos técnicos.

O sistema foi criado como trabalho voluntário e está disponibilizado para qualquer município que venha dele necessitar. Precisa de melhorias e de resolução de pequenos erros, porém sua construção é apenas um passo inicial para se obter uma ferramenta de gerenciamento de unidades.

