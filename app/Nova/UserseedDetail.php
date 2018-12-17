<?php

namespace App\Nova;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class UserseedDetail extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\UserseedDetail';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Seed Name', 'seed_name')->sortable()->rules('max:191'),
            Number::make('Variety ID', 'variety_id')->sortable(),
            Number::make('Supplier ID', 'supplier_id')->sortable(),
            Text::make('Density', 'denisty')->sortable()->rules('max:191'),
            Number::make('User ID', 'user_id')->sortable(),
            Text::make('Measurement', 'measurement')->sortable()->rules('max:191'),
            Text::make('Tray Size', 'tray_size')->sortable()->rules('max:191'),
            Text::make('Soak Status', 'soak_status')->sortable()->rules('max:191'),
            Text::make('Germination', 'germination')->sortable()->rules('max:191'),
            Text::make('Situation', 'situation')->sortable()->rules('max:191'),
            Text::make('Medium', 'medium')->sortable()->rules('max:191'),
            Text::make('Maturity', 'maturity')->sortable()->rules('max:191'),
            Number::make('Yield', 'yield')->sortable(),
            Text::make('Seeds Measurement', 'seeds_measurement')->sortable()->rules('max:191'),
            DateTime::make('Deleted At', 'deleted_at')->sortable(0),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
