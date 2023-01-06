<?php

namespace App\Repositories\backOffice;

use App\Helpers\GuzzleHttpHelper;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Yajra\DataTables\DataTables;

//use Your Model

/**
 * Class CityRepository.
 */
class CityRepository extends BaseRepository
{
    protected $city;
    protected $guzzle;

    function __construct(City $city, GuzzleHttpHelper $guzzle)
    {
        $this->city = $city;
        $this->guzzle = $guzzle;
        
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return City::class;
    }

    public function allCity()
    {
        $cities = City::get();
            return DataTables::of($cities)
            ->addColumn('action', function ($row) {
                $csrf = csrf_token();
                return '<form method="POST" action="/cities-destroy/'.$row->id.'">
                                    <input name="_token" type="hidden" value='.$csrf.'>
                                    <input name="_method" type="hidden" value="DELETE">
                            <a class="btn btn-info" href="/cities-show/'.$row->id.'"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-primary" href="/cities-edit/'.$row->id.'"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="sa-warning btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>';
                })
                ->editColumn('info', function ($row) {
                    return substr($row->info,0,15);
               })
               ->escapeColumns([])
            ->make(true);
    }

    public function getCity()
    {
        return City::all();
    }

    public function storeCityByApi()
    {
        $client = $this->guzzle::setAuth();
        $cities = $client->getCityList();
        $data = $cities['data']['cities'];
        DB::table('cities')->truncate();
        foreach($data as $key=> $value)
        {
            City::create([
                'city_en' => $value['city_en'],
                'city_ar' => $value['city_ar'],
            ]);
        }
        return response()->json(['success'=>true]);
    }
}
