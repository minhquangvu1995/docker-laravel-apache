<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const EMPLOYEE_NAME = 'Minh Vũ Quang';
    const COMPANY_NAME = 'Hybrid Technologies';

    public function index()
    {
        $helper = new Helper();
        echo '### https://github.com/jupeter/clean-code-php';
        $helper->generateTitle('Use meaningful and pronounceable variable names');
        $moment = Carbon::now();
        $currentDate = $moment->format('y-m-d');
        echo $currentDate;
        $helper->generateLines();

        $helper->generateTitle('Use the same vocabulary for the same type of variable');
        echo $this->getUser()['info'];
        $helper->generateLines();

        $helper->generateTitle('Use searchable names');
        $input = [
            'name' => 'Minh Vũ Quang',
            'company' => 'Hybrid Technologies',
        ];
        if ($input['name'] == self::EMPLOYEE_NAME && $input['company'] == self::COMPANY_NAME) {
            echo 'Exactly!';
        }
        $helper->generateLines();

        $helper->generateTitle('Use explanatory variables');
        $address = 'One Infinite Loop, Cupertino 95014';
        $cityZipCodeRegex = '/^[^,]+,\s*(?<city>.+?)\s*(?<zipCode>\d{5})$/';
        preg_match($cityZipCodeRegex, $address, $matches);
        var_dump($matches);
        $helper->generateLines();

        $helper->generateTitle('Avoid nesting too deeply and return early');
        echo $this->isShopOpen('friday');
        $helper->generateLines();

        $helper->generateTitle('Don\'t write to global functions');
        echo 'This Helper class';
        $helper->generateLines();
    }

    protected function getUser()
    {
        return [
            'info' => 'citizen identification',
            'data' => ['name' => 'minhvq'],
            'record' => 123,
            'profile' => 'nothing',
        ];
    }

    protected function isShopOpen(string $day): bool
    {
        if (empty($day)) {
            return false;
        }

        $openingDays = ['friday', 'saturday', 'sunday'];

        return in_array(strtolower($day), $openingDays, true);
    }

    protected function fibonacci($n)
    {
        if($n === 0 || $n === 1) {
            return $n;
        }

        if ($n >= 50) {
            return 'Not supported';
        }

        return $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
    }
}
