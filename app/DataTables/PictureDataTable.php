<?php

namespace App\DataTables;

use App\Models\Picture;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;

class PictureDataTable extends DataTable
{
    
    public function dataTable($query, Picture $picture)
    {   $query = Picture::where('id', $albm_id);
        $dataTable = new EloquentDataTable($query);

        $dataTable->editColumn('name', function (Picture $picture) {
            $div_name = '<span class="badge " style="background:' . $picture->color . ' ">'.$picture->name.'</span>';
            return $div_name;
        });  

        $dataTable->editColumn('picture', function (Picture $picture) {
            $div_name = '<img class="img-responsive " src="'.asset('uploads/albums/'.$picture->picture).'">';
            return $div_name;
        });

        return $dataTable->addColumn('action', function (Picture $picture) {
            return view('pictures.datatables_actions', compact('picture'));
        })->filterColumn('name', function ($query, $keyword) {

            $query->whereTranslationLike('name', '%' . $keyword . '%');

        })->rawColumns(["action", 'name', 'picture']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param PictureDataTable $model
     * @return Builder
     */
    public function query(Picture $model)
    {   
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $default_lang = app()->getLocale();
        $lang_json = $default_lang == "ar" ? 'Arabic.json' : 'English.json';

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => 'auto', 'printable' => true, 'searchable' => true, 'exporting' => true, 'title' => 'Action'])
            ->parameters([
                'stateSave' => false,
                'responsive' => true,
                "autoWidth" => true,
                'orderable' => true,
                'dom' => '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l><"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>>t<"d-flex justify-content-between mx-2 row mb-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                'pagingType' => 'simple_numbers',
//                'initComplete' => 'function() { $(\'ul.pagination\').addClass(\'flex-wrap\'); }',
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'print', 'className'=> 'btn btn-primary', 'text'=> "<i class='fa fa-print'></i> " .' Print'],
                    ['extend' => 'csv', 'className'=> 'btn btn-info', 'text'=>"<i class='fa fa-download'></i> " . 'EXPORT CSV'],
                    ['extend' => 'excel', 'className'=> 'btn btn-info', 'text'=>"<i class='fa fa-download'></i> " .'EXPORT Excel'],
                    ['extend' => 'reload', 'className'=> 'btn btn-info', 'text'=> "<i class='fa fa-refresh' aria-hidden='true'></i> " . 'Reload'],

                ],
                //'buttons' => [],

                'drawCallback' => 'function() { lazyLoadInstance.update(); $(".dropdown-toggle").dropdown();}',
                'language' => [
                    'url' => url("//cdn.datatables.net/plug-ins/1.10.12/i18n/{$lang_json}"),
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => '#', 'data' => 'id', 'visible' => true, 'printable' => false, 'searchable' => false, 'exporting' => false]),
            
            'picture' => new Column(['title' => 'Picture', 'data' => 'picture']),
            'name' => new Column(['title' => 'Name', 'data' => 'picture_name']),
             
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pictures_datatable_' . time();
    }
}
