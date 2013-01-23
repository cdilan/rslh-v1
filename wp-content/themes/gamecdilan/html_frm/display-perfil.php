<?php
/**
 * Custom display = perfil-do-jogador
 * Id = 55
 */
?>
<div class="row">
    <div class="span5">
        <div class="thumbnail">
            <div id="player-avatar">
                [userdid-basico show="avatar"]
            </div>
            <div id="player-info">
                <h1>[lh-basico]</h1>
                <p>[nome-basico] [sobrenome-basico]</p>
                <div class="player-social">
                    [display-frm-data id=57 uid=[uid-basico]]
                </div>
            </div>
        </div>
    </div>
    <div class="span3">
        <div id="points" class="well well-small">
            <h2><strong>35</strong> Pontos</h2>
        </div>
    </div>
</div>
<div id="player-address" class="well well-small">
    <h3>Localização</h3>
    <p>[basico-endereco], [basico-numero] - [basico-bairro] - [basico-cidade] - [basico-estado] - [cep-basico]</p>
    <div id="player-map">
        [google-map-v3 width="560" height="200" zoom="13" maptype="roadmap" mapalign="center" directionhint="false" language="default" poweredby="false" maptypecontrol="false" pancontrol="false" zoomcontrol="true" scalecontrol="false" streetviewcontrol="false" scrollwheelcontrol="false" draggable="true" tiltfourtyfive="false" addmarkermashupbubble="false" addmarkermashupbubble="false" addmarkerlist="[basico-endereco], [basico-numero] - [basico-bairro] - [basico-cidade] - [basico-estado]{}1-default.png" bubbleautopan="true" showbike="false" showtraffic="false" showpanoramio="false"]
    </div>
</div>
<div id="player-medal" class="well well-small">
    <h3>Medalhas</h3>
    [display-frm-data id=56 jogador=[uid-basico]]
</div>