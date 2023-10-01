<?php

namespace App\DataTables;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DivisiDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($data) {
                $ajax = route('ajax.getDivisi', $data->id);
                $update = route('divisi.update', $data->id);
                $delete = route('divisi.destroy', $data->id);

                return "<a onclick='handleEditDivisi(this)' data-id='$data->id' data-url='$update' data-ajax='$ajax' style='cursor: pointer;' class='text-warning mr-2'><i class='fas fa-edit'></i></a>
                        <a onclick='handleDelete(this)' data-id='$data->id' data-url='$delete' style='cursor: pointer;' class='text-danger mr-2'><i class='fas fa-trash'></i></a>";
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Divisi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Divisi $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'asc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('datatableserverside')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('name'),
            Column::make('kode'),
            Column::make('desc')->title('Deksripsi'),
            Column::make('status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Divisi_' . date('YmdHis');
    }
}
