<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Seedsdetail extends Resource
{

    public static $table = 'seeds_detail';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Seedsdetail';

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
        'id','variety_id','soak_status','germination','situation','medium','maturity','yield','seeds_measurement','notes','status','deleted_at'
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
            ID::make('ID', 'id')->sortable(),

            Number::make('Variety ID', 'variety_id')->sortable()->rules('required','max:11'),

            Text::make('Soak Status', 'soak_status')->sortable()->rules('max:191'),
            Text::make('Germination', 'germination')->sortable()->rules('max:191'),
            Text::make('Situation', 'situation')->sortable()->rules('max:191'),
            Text::make('Medium', 'medium')->sortable()->rules('max:191'),
            Text::make('Maturity', 'maturity')->sortable()->rules('max:191'),
            Text::make('Maturity', 'maturity')->sortable()->rules('max:191'),
            Number::make('Yield', 'yield')->sortable()->rules('max:11'),
            Text::make('Seeds Measurement', 'seeds_measurement')->sortable()->rules('max:191'),
            Boolean::make('Status', 'status')->sortable(),
            DateTime::make('Deleted At', 'deleted_at')->sortable(0),


//            Number::make('Seed ')
//                ->sortable()
//                ->rules('required','max:11'),

//            Number::make('Variety ID')
//                ->sortable()
//                ->rules('required', 'max:11'),
//
//            Number::make('Soak Status')
//                ->sortable()
//                ->rules('required', 'max:11'),
//
//            Number::make('Germination')
//                ->sortable()
//                ->rules('required', 'max:11'),
//
//            Text::make('Situation')
//                ->sortable()
//                ->rules('required', 'max:255'),
//
//            Text::make('Medium')
//                ->sortable()
//                ->rules('required', 'max:255'),
//
//            Number::make('Maturity')
//                ->sortable()
//                ->rules('required', 'max:11'),
//
//            Number::make('Yield')
//                ->sortable()
//                ->rules('required', 'max:11'),
//
//            Text::make('Seed Measurement')
//                ->sortable()
//                ->rules('required', 'max:255'),
//
//            DateTime::make('Deleted at')
//                ->sortable()
//                ->rules(''),
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
