<?php

namespace Coluna\Entity\View;

use Nucleo\Service\GenericEntity;

class VColUltimasPostadas extends GenericEntity {
	
    private $usrId;
    private $ctgId;
    private $chvId;
    private $colId;
    private $colTitulo;
    private $colTexto;
    private $colDataPostagem;
    private $colDataModificacao;
    private $colResumo;
    private $colObservacao;
    private $colEndImagem;
    private $colStatus;
    private $chvNome;
    private $ctgNome;
    private $ctgApelido;
    private $usrLogin;
    private $usrSenha;
    private $usrEmail;
    private $usrNome;
    private $usrSobrenome;
    private $usrGenero;
    private $usrDataNascimento;
    private $usrDataCadastro;
    private $usrFoto;
    private $usrStatus;

    public function __call($name, $arguments) {
        $attr = lcfirst(substr($name, 3));
        if(strpos($name, 'set') === 0){
            $this->$attr = $arguments[0];
        } else if(strpos($name, 'get') === 0){
            return $this->$attr;
        } else {
            return false;;
        }
    }
}
?>