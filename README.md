rslh-v1
=======

Reinvente sua Lan House

instalação
=========
<ol>
    <li>crie em seu localhost um site chamado 'rslh-v1'</li>
    <li>instale o wordpress com a seguinte configuração</li>
    <ol>
        <li>use o pacote wordpress-3.5-pt_BR</li>
        <li>dbase - 'rslh-v1'</li>
    </ol>
    <li>clone o GIT apontando para essa página</li>
    <li>faça as seguintes alterações no DUMP do SQL (peça por email ao PO)</li>
    <ol>
        <li>substitua</li>
        <ol>
            <li>'www.reinventesualanhouse.com.br' por 'localhost/rslh-v1'</li>
            <li>'http://reinventesualanhouse.com.br' por 'http://localhost/rslh-v1'</li>
        </ol>
        <li>elimine todas as tabelas do dbase 'rslh-v1'</li>
        <li>copie o DUMP alterado e rode o SQL</li>
    </ol>
    <li>ative o tema GAME CDILan</li>
    <li>ative os seguintes plugins</li>
    <ul><ul>
        <li>Avatars</li>
        <li>Categories Images</li>
        <li>Category Order and Taxonomy Terms Order</li>
        <li>Comprehensive Google Map Plugin</li>
        <li>CubePoints</li>
        <li>Digg Digg</li>
        <li>Easy FancyBox</li>
        <li>Formidable</li>
        <li>Social Connect</li>
        <li>Usernoise</li>
        <li>User Role Editor</li>
        <li>WordPress Access Control</li>
    </ul></ul>
</ol>

Observações
===========

A conexão via FACEBOOK não funciona no local host<br/>
Alguns formulários do Formidable perdem configurações de Custom Display e Mensagens de Email, se a programação envolver o Formidable, por favor atualize seu localhost pelo DEV.cdilan.com.br<br/>
