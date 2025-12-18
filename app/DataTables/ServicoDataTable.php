<?php

namespace App\DataTables;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServicoDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<ServicoDataTable> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('editar', function($row) {
                $editar = '<a href="'.route('servicos.edit', $row->id).'" class="btn btn-primary"><i class= "fa fa-edit"></i></a>';
                $deletar = '<a href="'.route('servicos.destroy', $row->id).'" class="btn btn-primary delete-item ml-2"><i class="fa fa-trash-alt"></i></a>';

                return $editar.$deletar;
            })
            ->addColumn('icone', function($query) {
                    $icone = '<i class="'.$query->icone.'" style="font-size:30px;"></i>';

                    return $icone;
            })

            ->addColumn('created_at', function($query) {
                return date('d/m/Y', strtotime($query->created_at));
            })
            ->rawColumns(['editar', 'icone', 'created_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<RedeSocial>
     */
    public function query(Servico $model): QueryBuilder
    {
        $idUser = Auth::id(); //Serve o conteúdo de acordo com o id do usuário logado
        $tipo = 'servicoAdmin'; //Separa pelo tipo de conteúdo
        return $model->newQuery()
        ->where('tipo', $tipo)
        ->where('usuario', $idUser);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('redesocial-table')
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
            Column::make('icone'),
            Column::make('titulo'),
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
        return 'Servico_' . date('YmdHis');
    }
}
