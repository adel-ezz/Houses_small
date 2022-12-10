<?php

namespace App\DataTables;

use App\Models\Season;
use App\Models\Vella;
//use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

class SeasonTable extends DataTable
{


    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.seasons.buttons.actions')
            ->addColumn('checkbox', '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
			<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}"> <span></span></label>')
            ->editColumn('created_at', function ($query) {
                \Illuminate\Support\Carbon::setLocale(app()->getLocale());
                return \Carbon\Carbon::parse($query->created_at)->diffForHumans();
            })
            ->editColumn('created_by',function ($q){
                return $q->user ? $q->user->name :'___';
            })

            ->rawColumns(['checkbox', 'show_action', 'actions','created_by']);
    }


    public function query()
    {

        return Season::query();

    }


    public function html()
    {
        $html = $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
                'responsive' => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('admin.all_records')]],
                'buttons' => [
                    ['extend' => 'excel', 'className' => 'btn btn-primary  btn-square btn-outline', 'text' => '<i class="far fa-file-excel"> </i> ' . trans('admin.export_excel')],
                    ['extend' => 'csv', 'className' => 'btn purple btn-outline', 'text' => '<i class="fa fa-file-excel-o"> </i> ' . trans('admin.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn btn-light  btn-square', 'text' => '<i class="fas fa-fan"></i> ' . trans('admin.reload')],
                    [
                        'text' => '<i class="fa fa-trash"></i> ' . trans('admin.delete'),
                        'className' => 'btn btn-danger deleteBtn  btn-square',
                    ],
//                    [
//                        'text' => '<i class="fa fa-plus"></i> ' . trans('admin.add'),
//                        'className' => 'btn btn-primary  btn-square',
//                        'action' => 'function(){
//                        	window.location.href =  "' . \URL::current() . '/create";
//                        }',
//                    ],
                ],
                'initComplete' => "function () {
                this.api().columns([1,2]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).attr( 'style', 'width: 100%');
                $(input).attr( 'class', 'form-control');
                 $(input).appendTo($(column.footer()))
                .on('keyup', function () {
                    column.search($(this).val()).draw();
                });
            });
            }",
                'order' => [[1, 'desc']],

                'language' => [
                    'sProcessing' => trans('admin.sProcessing'),
                    'sLengthMenu' => trans('admin.sLengthMenu'),
                    'sZeroRecords' => trans('admin.sZeroRecords'),
                    'sEmptyTable' => trans('admin.sEmptyTable'),
                    'sInfo' => trans('admin.sInfo'),
                    'sInfoEmpty' => trans('admin.sInfoEmpty'),
                    'sInfoFiltered' => trans('admin.sInfoFiltered'),
                    'sInfoPostFix' => trans('admin.sInfoPostFix'),
                    'sSearch' => trans('admin.sSearch'),
                    'sUrl' => trans('admin.sUrl'),
                    'sInfoThousands' => trans('admin.sInfoThousands'),
                    'sLoadingRecords' => trans('admin.sLoadingRecords'),
                    'oPaginate' => [
                        'sFirst' => trans('admin.sFirst'),
                        'sLast' => trans('admin.sLast'),
                        'sNext' => trans('admin.sNext'),
                        'sPrevious' => trans('admin.sPrevious'),
                    ],
                    'oAria' => [
                        'sSortAscending' => trans('admin.sSortAscending'),
                        'sSortDescending' => trans('admin.sSortDescending'),
                    ],
                ]
            ]);

        return $html;

    }


    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                  <input type="checkbox" class="select-all" onclick="select_all()" >
                  <span></span></label>',
                'orderable' => false,
                'searchable' => false,
                'exportable' => false,
                'printable' => false,
                'width' => '10px',
                'aaSorting' => 'none'
            ],


            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans('admin.name'),
            ],
            [
                'name' => 'start',
                'data' => 'start',
                'title' => trans('start'),
            ],
            [
                'name' => 'end',
                'data' => 'end',
                'title' => trans('end'),
            ],

            [
                'name' => 'created_by',
                'data' => 'created_by',
                'title' => trans('admin.created_by'),
            ],

            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => trans('admin.created_at'),
            ],
            [
                'name' => 'actions',
                'data' => 'actions',
                'title' => trans('admin.actions'),
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ]
        ];
    }


    /**
     * Get filename for export.
     * @return string
     */
    protected function Vella()
    {
        return 'Vella_' . time();
    }

}
