<?php

namespace App\DataTables;

use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratMasukDataTable extends DataTable
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
                $ajax = route('ajax.getSuratM', $data->id);
                $show = route('surat-masuk.disposisi', $data->id);
                $update = route('surat-masuk.update', $data->id);
                $delete = route('surat-masuk.destroy', $data->id);

                if(route('disposisi.index') == url()->current()) {
                    return "<a href='$show' class='btn btn-primary btn-sm d-block'><i class='fas fa-eye'></i></a>";
                }

                // Jika status disetujui
                if($data->check_status == 'Disetujui') {
                    if(Gate::check('is_kepalabidang')) {
                        return "<a onclick='handleShowSuratM(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>";
                    }
                    if(Gate::check('is_sekretaris')) {
                        return "<a onclick='handleShowSuratM(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>";
                    }
                }

                // Jika status menunggu verifikasi
                if($data->check_status == 'Menunggu Verifikasi') {
                    if(Gate::check('is_sekretaris')) {
                        return "<a onclick='handleShowSuratM(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>";
                    }
                    if(Gate::check('is_kepalabidang')) {
                        return "<a onclick='handleEditSuratM(this)' data-id='$data->id' data-url='$update' data-roles='kepalabidang' data-status='verif' data-ajax='$ajax' data-roles='kepalabidang' style='cursor: pointer;' class='text-warning mr-2'><i class='fas fa-edit'></i></a>";
                    }
                }

                // Jika status koreksi
                if($data->check_status == 'Koreksi') {
                    if(Gate::check('is_sekretaris')) {
                        return "<a onclick='handleEditSuratM(this)' data-id='$data->id' data-url='$update' data-ajax='$ajax' data-roles='kepalabidang' data-status='koreksi' style='cursor: pointer;' class='text-warning mr-2'><i class='fas fa-edit'></i></a>";
                    }
                    if(Gate::check('is_kepalabidang')) {
                        return "<a onclick='handleShowSuratM(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>";
                    }
                }

                return "<a onclick='handleShowSuratM(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>
                        <a onclick='handleDelete(this)' data-id='$data->id' data-url='$delete' style='cursor: pointer;' class='text-danger mr-2'><i class='fas fa-trash'></i></a>";

                return "<a onclick='handleShowSuratM(this)' data-id='$data->id' data-ajax='$ajax' style='cursor: pointer;' class='text-primary mr-2'><i class='fas fa-eye'></i></a>
                        <a onclick='handleEditSuratM(this)' data-id='$data->id' data-url='$update' data-ajax='$ajax' data-roles='' data-status='' style='cursor: pointer;' class='text-warning mr-2'><i class='fas fa-edit'></i></a>
                        <a onclick='handleDelete(this)' data-id='$data->id' data-url='$delete' style='cursor: pointer;' class='text-danger mr-2'><i class='fas fa-trash'></i></a>";
            })
            ->editColumn('tanggal_surat', function($data) {
                return $data->tanggal_surat ? date("d-m-Y", strtotime($data->tanggal_surat)) : '';
            })
            ->editColumn('tanggal_surat_masuk', function($data) {
                return $data->tanggal_surat_masuk ? date("d-m-Y", strtotime($data->tanggal_surat_masuk)) : '';
            })
            ->editColumn('check_status', function($data) {
                $status = "badge-success";
                if($data->check_status == 'Menunggu Verifikasi') {
                    $status = "badge-warning";
                } else if($data->check_status == 'Koreksi') {
                    $status = "badge-danger";
                }
                return "<span class='badge badge-pill $status'>$data->check_status</span>";
            })
            ->rawColumns(['action', 'check_status'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SuratMasuk $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SuratMasuk $model): QueryBuilder
    {
        if($this->status == "accept") {
            return $model->newQuery()->orderBy('sifat_surat', 'desc')->where('check_status', 'Disetujui');
        } else if($this->status == "correction") {
            return $model->newQuery()->orderBy('sifat_surat', 'desc')->where('check_status', 'Koreksi');
        }

        return $model->newQuery()->orderBy('sifat_surat', 'desc')->where('check_status', 'Menunggu Verifikasi');
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
        if(route('disposisi.index') == url()->current()) {
            return [
                Column::computed('action')
                      ->exportable(false)
                      ->printable(false)
                      ->width(100)
                      ->addClass('text-center'),
                Column::make('no_surat')->title('Nomor Surat'),
                Column::make('sumber_surat'),
                Column::make('tanggal_surat'),
                Column::make('sifat_surat'),
            ];
        }
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
            Column::make('no_surat')->title('Nomor Surat'),
            Column::make('status_surat'),
            Column::make('sumber_surat'),
            Column::make('tanggal_surat'),
            Column::make('tanggal_surat_masuk'),
            Column::make('sifat_surat'),
            Column::make('check_status')->title('Status')->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'SuratMasuk_' . date('YmdHis');
    }
}
