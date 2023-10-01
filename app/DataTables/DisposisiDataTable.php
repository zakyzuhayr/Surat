<?php

namespace App\DataTables;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DisposisiDataTable extends DataTable
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
                $ajax = route('ajax.getDisposisi', $data->id);
                $show = route('disposisi.show', $data->id);
                $update = route('disposisi.update', $data->id);
                $delete = route('disposisi.destroy', $data->id);

                return "<a href='$show' class='btn btn-primary btn-sm d-block'><i class='fas fa-eye'></i></a>";

                return "<a href='$show' data-id='$data->id' data-url='$update' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>
                        <a onclick='handleEditDivisi(this)' data-id='$data->id' data-url='$update' data-ajax='$ajax' style='cursor: pointer;' class='text-warning mr-2'><i class='fas fa-edit'></i></a>
                        <a onclick='handleDelete(this)' data-id='$data->id' data-url='$delete' style='cursor: pointer;' class='text-danger mr-2'><i class='fas fa-trash'></i></a>";
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Disposisi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Disposisi $model): QueryBuilder
    {
        return $model->newQuery()->with('suratmasuk');
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
            Column::make('penerima'),
            Column::make('tenggat_waktu'),
            Column::make('sifat_status'),
            Column::make('suratmasuk.no_surat')->title('No. Surat'),
            Column::make('suratmasuk.kode_surat')->title('Kode Surat'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Disposisi_' . date('YmdHis');
    }
}
