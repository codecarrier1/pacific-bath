<?php

namespace App\Nova;

use App\Nova\Actions\ImportSalesforceId;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphToMany;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'full_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'email',
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'User';

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = ['roles', 'permissions', 'location'];

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

            Gravatar::make(),

            Text::make('Name', function() {
                return $this->full_name;
            })
                ->sortable()
                ->hideFromDetail(),

            Text::make('First Name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Select::make('Timezone')->options([
               'America/New_York' => 'Eastern',
               'America/Chicago' => 'Central',
               'America/Denver' => 'Mountain',
               'America/Los_Angeles' => 'Pacific',
            ])
                ->creationRules(['required'])
                ->hideFromIndex(),

            Text::make('Phone'),
//            Text::make('Lead Perfection Client ID', 'lp_client_id')->hideFromIndex(),
//            Text::make('Lead Perfection User ID', 'lp_user_id')->hideFromIndex(),
//            Text::make('Lead Perfection Password', 'lp_password')->hideFromIndex(),
            Text::make('Salesforce Id')->readonly()->help('The system will get this field from Salesforce automatically.'),
            BelongsTo::make('Location'),
            MorphToMany::make('Roles', 'roles', \Vyuldashev\NovaPermission\Role::class)->searchable(),
            MorphToMany::make('Permissions', 'permissions', \Vyuldashev\NovaPermission\Permission::class)->searchable(),

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
        return [
            new ImportSalesforceId,
        ];
    }
}
