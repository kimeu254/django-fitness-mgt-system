<?php

namespace App\DataTables;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MembersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'members.action')
            ->addColumn('name', function ($query){
                return $query->user->first_name.' '.$query->user->last_name;
            })
            ->addColumn('email', function ($query){
                return $query->user->email;
            })
            ->addColumn('phone', function ($query){
                return $query->user->phone;
            })
            ->addColumn('city', function ($query){
                return $query->user->city;
            })
            ->addColumn('address', function ($query){
                return $query->user->address;
            })
            ->addColumn('status', function ($query){
                if ($query->user->status == 1)
                {
                    $status = 'Active';
                }
                else
                {
                    $status = 'Disabled';
                }
                return $status;
            })
            ->addColumn('member since', function ($query) {
                return Carbon::parse($query->created_at)->toFormattedDayDateString();
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Member $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('members-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->parameters([
                        'responsive' => true,
                        'autoWidth' => false
                    ])
                    ->orderBy(1)
                    ->selectStyleSingle()
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
            Column::make('membership_no'),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('city'),
            Column::make('address'),
            Column::make('member since'),
            Column::make('status')
                ->addClass('text-center text-capitalize'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Members_' . date('YmdHis');
    }
}
