<?php 

namespace App\Services;

/**
 * Recursos compartilhados em todas as views
 */
class DataResourceView
{
    public function resource()
    {
        $arrDataView = [
            'title' => 'Teste recurso view',
        ];
        return $arrDataView;
    }
}