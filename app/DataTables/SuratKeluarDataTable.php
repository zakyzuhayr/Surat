<?php

namespace App\DataTables;

use App\Models\SuratKeluar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratKeluarDataTable extends DataTable
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
                $ajax = route('ajax.getSuratK', $data->id);
                $update = route('surat-keluar.show', $data->id);
                $update = route('surat-keluar.update', $data->id);
                $delete = route('surat-keluar.destroy', $data->id);

                return "<a onclick='handleShowSuratK(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>
                        <a onclick='handleEditSuratK(this)' data-id='$data->id' data-url='$update' data-ajax='$ajax' data-roles='' data-status='' style='cursor: pointer;' class='text-warning mr-2'><i class='fas fa-edit'></i></a>
                        <a onclick='handleDelete(this)' data-id='$data->id' data-url='$delete' style='cursor: pointer;' class='text-danger mr-2'><i class='fas fa-trash'></i></a>";
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SuratKeluar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SuratKeluar $model): QueryBuilder
    {
        return $model->newQuery();
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
                  ->width(100)
                  ->addClass('text-center'),
            Column::make('no_surat'),
            Column::make('sifat_surat'),
            Column::make('tanggal_surat'),
            Column::make('surat_kepada'),
            Column::make('pembuat_surat'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'SuratKeluar_' . date('YmdHis');
    }
}
