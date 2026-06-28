<?php
include '../../../src/function/limpador.php';
include '../../../src/function/selectCharacter.php';

function menuShow()
{
    echo str_repeat("==", 52) . "\n";
    echo "|| ±l∫≥√∑√≥≤∫∫∂∏   ∇∂√∑√∂≥    ≥∏∇∏÷i  <!<<<><>><i   !<>!ll!:  i<   ∑∂≥≥∑∂≥ >≤≥∑     l≥∑√√≥∑∑∇∫       ||       
||   ≤>∑≈≈=-=+!≠≠>∂ ×<<÷!,  ÷,≤<l!l:≠± ll-lIIlIl÷    ±l+!!≤   ÷>>   ×-=i; ≤÷!=≥     I≤=+!÷<l∑÷≈>     ||   
||   ±+√±√>   ×!-≥÷≈ ±÷×±i l≈>>l    -± ≈>+×≥   -÷     =<∑>±  ÷=<<  i≤≥>: +∑II√÷≥    i≤√+-× >=∑+≠     ||   
||   ≠l≤×≥<    ≈++±± ÷×∇≠ ≤±≠-∑        ≠=×÷≈ :√×      ÷l≠±≠ ≠>≈≥>∫ ≤≤<>  +÷I>+∂×    ;≠±≠=× ≥÷±<≈     ||   
||   √-=<≥>    ×<∂×< ×-√≈ ×≤-l!        ≈±=≤≤∑≤>-       ×<±--∑≠l=≈>÷≠≥÷; ;=l:;≥÷∫≠   :≈=÷≈≤≥≥I+l      ||   
||   ÷-×≤±+    ≤+∂>> ≈-=± ±!∫÷∏        ≠-≥×> l≤+        =≈≠÷<>±:√±≠≈lI ≠l±:!!l>√-±  i≠∂±+=!∑=±       ||   
||   ±+≠≈÷>   ≤>=<!! ×+±÷  +<>≠=    i≤-≠=≠=×    =÷      ×l≥±≤= !l∫==-. ≤->--==++∂>≈ I±÷±>-+<≈=≈      ||   
||   ±>÷÷÷I  ≥=-ii<  i===; l+;≠≈=+-+÷<I->≠++<<!÷I÷       ×!>!÷  ><±>I ∂±+<    I-∫÷+≠l=÷±!≠ l<≤>≤     ||   
||   ≈+<÷≠×÷±!Ii+  -×iIII>≠   -I<iI>÷ ≈IiIIiIIIl±        -<I×   l+<>√÷ii;l∫  !≠iiIII×IIii+√ +>=-=    ||   
|| ÷<!<!!!!!I                                                                                 !ll××∏ || \n";
    echo str_repeat("==", 52) . "\n";
    echo "Bem vindo ao Jogo \n";
    echo "|| Escolha o seu personagem: || \n";
}    

function menuController() {
    echo "\n----------------------------------------------------\n";
    echo "[A] Personagem Anterior [D] Personagem Seguinte  |  [ENTER] Confirmar\n";
    echo "Digite o comando: ";
}
