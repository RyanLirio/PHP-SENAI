<?php

    function traduz_concluida($concluida)
    {
        if($concluida == 1){
            return 'Sim';
        }
        
        return 'Não';
    }

    function traduz_prioridade($codigo){
        $prioridade = '';
        switch($codigo){
            case 1:
                $prioridade = 'Baixa';
                break;
            case 2:
                $prioridade = 'Média';
                break;
            case 3:
                $prioridade = 'Alta';
                break;
        }
        return $prioridade;
    }

    function traduz_data_para_banco($data)
    {
        if ($data == "") {
            return "";
        }
        // Se vier no formato YYYY-MM-DD, retorna direto
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
            return $data;
        }
        // Se vier no formato DD-MM-YYYY ou DD/MM/YYYY, converte
        $data = str_replace("-", "/", $data);
        $dados = explode("/", $data);
        if (count($dados) == 3) {
            return "{$dados[2]}-{$dados[1]}-{$dados[0]}";
        }
        return $data;
    }

    function traduz_data_para_exibir($data)
    {
        if ($data == "" || $data == "0000-00-00") {
            return "";
        }
        $dados = explode("-", $data);
        if (count($dados) == 3) {
            return "{$dados[2]}/{$dados[1]}/{$dados[0]}";
        }
        return $data;
    }

    function tarefa_atrasada($data)
    {
        if ($data == "" || $data == "0000-00-00") {
            return false;
        }
        $data_atual = strtotime(date('Y-m-d'));
        $data_tarefa = strtotime($data);
        if ($data_tarefa >= $data_atual) {
            return false;
        }
        return true;
    }
    
    
?>