<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Enums\ZoneEnum;

use App\Models\Address;

use App\Models\EpiUser;

use App\Models\FinanceUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\VaccineCenter;
use App\Models\VaccineCenterTran;
use App\Traits\Helper\HelperTrait;
use App\Traits\Address\AddressTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use App\Repositories\User\UserRepositoryInterface;

class TestController extends Controller
{
    protected $userRepository;
    use HelperTrait;

    private function detectDevice($userAgent)
    {
        if (str_contains($userAgent, 'Windows')) return 'Windows PC';
        if (str_contains($userAgent, 'Macintosh')) return 'Mac';
        if (str_contains($userAgent, 'iPhone')) return 'iPhone';
        if (str_contains($userAgent, 'Android')) return 'Android Device';
        return 'Unknown Device';
    }

    private function getLocationFromIP($ip)
    {

        try {
            $response = Http::get("http://ip-api.com/json/{$ip}");
            return $response->json()['city'] . ', ' . $response->json()['country'];
        } catch (\Exception $e) {
            return 'Unknown Location';
        }
    }
    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    use AddressTrait;

    public function format($approvals)
    {
        return $approvals->groupBy('id')->map(function ($group) {
            $docs = $group->filter(function ($item) {
                return $item->approval_document_id !== null;
            });

            $approval = $group->first();

            $approval->approved = (bool) $approval->approved;
            if ($docs->isNotEmpty()) {
                $docs->documents = $docs->map(function ($doc) {
                    return [
                        'id' => $doc->approval_document_id,
                        'documentable_id' => $doc->documentable_id,
                        'documentable_type' => $doc->documentable_type,
                    ];
                });
            } else {
                $approval->documents = [];
            }
            unset($approval->approval_document_id);

            return $approval;
        })->values();
    }
    function extractDeviceInfo($userAgent)
    {
        // Match OS and architecture details
        if (preg_match('/\(([^)]+)\)/', $userAgent, $matches)) {
            return $matches[1]; // Extract content inside parentheses
        }
        return "Unknown Device";
    }
    function extractBrowserInfo($userAgent)
    {
        // Match major browsers (Chrome, Firefox, Safari, Edge, Opera, etc.)
        if (preg_match('/(Chrome|Firefox|Safari|Edge|Opera|OPR|MSIE|Trident)[\/ ]([\d.]+)/', $userAgent, $matches)) {
            $browser = $matches[1];
            $version = $matches[2];

            // Fix for Opera (uses "OPR" in User-Agent)
            if ($browser == 'OPR') {
                $browser = 'Opera';
            }

            // Fix for Internet Explorer (uses "Trident" in newer versions)
            if ($browser == 'Trident') {
                preg_match('/rv:([\d.]+)/', $userAgent, $rvMatches);
                $version = $rvMatches[1] ?? $version;
                $browser = 'Internet Explorer';
            }

            return "$browser $version";
        }

        return "Unknown Browser";
    }
    public function index(Request $request)
    {

        EpiUser::factory()->create([
            "registeration_number" => 'epi-2025-3',
            'username' => 'EPI ',
            'full_name' => 'Epi ',
            'password' =>  Hash::make("123123123"),
            'email_id' =>  1,
            'status' =>  true,
            'zone_id' =>  ZoneEnum::kabul,
            'province_id' =>  ZoneEnum::kabul,
            'gender_id' =>  1,
            'role_id' =>  RoleEnum::epi_super->value,
            'job_id' =>  1,
            'destination_id' =>  1,
        ]);
        return 'asa';
        $columns =  Schema::getColumnListing('users');
        $formattedColumns = array_map(fn($column) => ['name' => $column], $columns);

        // Get IP Address
        $ip = $request->ip();

        // Get User Agent
        $userAgent = $request->header('User-Agent');

        // Get Device Info (Optional - Extract from User-Agent)
        $device = $this->detectDevice('');

        return $this->extractDeviceInfo($userAgent);
    }


    public function vaccineCenterStore()
    {
        // Path to the Excel file
        $filePath = storage_path('app/private/vaccine_center_name.xlsx');

        // Check if the file exists
        if (!file_exists($filePath)) {

            return 'file not found';
        }

        // Load the Excel file
        $data = Excel::toArray([], $filePath);

        return $data;
        return response()->json([
            'preview' => $data[0], // returns the first sheet data
        ]);

        // Loop through the rows and insert into the database
        foreach ($data[0] as $row) {
            // Skip the header row
            if ($row[0] === 'S/N') {
                continue;
            }

            // Create Address and Vaccine Center records
            $address = Address::create([
                'district_id' => $row[2], // District column
                'province_id' => $row[1], // Province column
            ]);

            $vaccineCenter = VaccineCenter::create([
                'description' => $row[3], // Type of Health Facility column
                'address_id' => $address->id,
            ]);

            VaccineCenterTran::create([
                'name' => $row[4], // Name of Health Facility column
                'language_name' => 'en',
                'vaccine_center_id' => $vaccineCenter->id,
            ]);
        }

        // $this->command->info('Vaccine centers imported successfully!');
    }
}
