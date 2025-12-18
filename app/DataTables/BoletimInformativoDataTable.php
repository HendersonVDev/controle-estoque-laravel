<?php

namespace App\DataTables;

use App\Models\BoletimInformativo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;

class BoletimInformativoDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<BoletimInformativo> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('editar', function($row) {
                $editar = '<a href="'.route('boletim-informativo.edit', $row->id).'" class="btn btn-primary"><i class= "fa fa-edit"></i></a>';
                $deletar = '<a href="'.route('boletim-informativo.destroy', $row->id).'" class="btn btn-primary delete-item ml-2"><i class="fa fa-trash-alt"></i></a>';

                return $editar.$deletar;
            })

            ->addColumn('status', function($query) {
                if($query->status == 'S') {
                    $status = '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input muda-status">
                <span class="custom-switch-indicator"></span>
                </label>';
                }else{
                    $status = '<label class="custom-switch mt-2">
    <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input muda-status">
    <span class="custom-switch-indicator"></span>
</label>';
                }
                return $status;
            })

            ->addColumn('created_at', function($query) {
                return date('d/m/Y', strtotime($query->created_at));
            })
            ->rawColumns(['editar', 'status', 'created_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<RedeSocial>
     */
    public function query(BoletimInformativo $model): QueryBuilder
    {
        $idUser = Auth::id(); //Serve o conteúdo de acordo com o id do usuário logado
        return $model->newQuery()
        ->where('usuario', $idUser);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    //->setTableId('redesocial-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->language(['url' => asset('backend/assets/traducao-datatable-brasil-ms/pt-BR.json')])
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('created_at')->title('Criado'),
            Column::make('email'),
            Column::make('status'),
            Column::computed('editar')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
            //Column::make('created_at')->title('Criado'),
            //Column::make('updated_at')->title('Atualizado'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BoletimInformativo_' . date('YmdHis');
    }
}
