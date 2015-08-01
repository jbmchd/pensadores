<?php

namespace Coluna\Controller;

use Zend\View\Model\ViewModel;
use Nucleo\Controller\ControllerGenerico;

class ColunasController extends ControllerGenerico {

    public function indexAction() {
        return new ViewModel();
    }

    protected function buscaColuna($col_id) {
        $srv_vcolunas = $this->p()->getEntity('Coluna', 'VColColuna');
        $coluna = $this->objetosParaArray($srv_vcolunas->getAllByColId($col_id));
        $coluna = $coluna[0];
        $coluna['filhas'] = [];
        if (!is_numeric($coluna['ser_id'] && is_string($coluna['ser_nome']) && strlen($coluna['ser_nome']) > 0)) {
            //busca filhos da coluna
            $filhas = (strlen($coluna['ser_nome']))? $this->objetosParaArray($srv_vcolunas->getAllBySerNomeOrderBySerOrdem($coluna['ser_nome'])):[];
            foreach ($filhas as $key => $filha) {

                if ($coluna['col_titulo'] == $coluna['ser_nome']) {
//                    $coluna['col_titulo'] = $filha['col_titulo'] .= ' - Introdução';
                } 

                $coluna['filhas'][$key]['col_id'] = $filha['col_id'];
                $coluna['filhas'][$key]['col_titulo'] = $filha['col_titulo'];
                $coluna['filhas'][$key]['col_data_postagem'] = $filha['col_data_postagem'];
                $coluna['filhas'][$key]['ser_ordem'] = $filha['ser_ordem'];
            }
        }




        return $coluna;
    }

}
