<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    private $coordinates;

    public function __construct() {
        $this->coordinates = [
            'Dr. Gonzalo Yong Memorial Bus Terminal' => ['Latitude' => 10.38420278095476, 'Longitude' => 124.98294787029519],
            'Palawan' => ['Latitude' => 10.383966349109677, 'Longitude' => 124.98012679477533],
            'Divine Rays' => ['Latitude' => 10.383210990124814, 'Longitude' => 124.97817229648348],
            'Cafe Romara near Shell Gas Station' => ['Latitude' => 10.381943467480333, 'Longitude' => 124.97589898616341],
            'Syshore' => ['Latitude' => 10.381161721675799, 'Longitude' => 124.97494728669413],
            'C-Oil' => ['Latitude' => 10.380924820393833, 'Longitude' => 124.97300626593925],
            'ADZ Funeral Services' => ['Latitude' => 10.380574302809435, 'Longitude' => 124.97198223313364],
            'Sogod Public Cemetery' => ['Latitude' => 10.380406546980234, 'Longitude' => 124.97146490698417],
            'Tampoong Gymnasium' => ['Latitude' => 10.379126328346887, 'Longitude' => 124.97105022710254],
            'Tampoong Brgy. Road' => ['Latitude' => 10.37852280760937, 'Longitude' => 124.97024193742334],
            'Malangsa Bridge' => ['Latitude' => 10.377927982349426, 'Longitude' => 124.96951150560999],
            'Sta Cruz Elementary School' => ['Latitude' => 10.377585706632953, 'Longitude' => 124.969130858106],
            'ELCANA Water Refilling Station' => ['Latitude' => 10.376936672845096, 'Longitude' => 124.96828456654109],
            'Sta Cruz Brgy Road(next ELCANA Water Refilling Station)' => ['Latitude' => 10.376033605545668, 'Longitude' => 124.96786153445717],
            'Sta Cruz Brgy Road (Near Sta Cruz Church)' => ['Latitude' => 10.375016900752847, 'Longitude' => 124.96789693038322],
            'Sta Cruz Church' => ['Latitude' => 10.373679377547091, 'Longitude' => 124.96819601884708],
            'Grace Joy Integrated Farm' => ['Latitude' => 10.373496311411401, 'Longitude' => 124.96827742849875],
            'Dodong Amora Funeral Homes' => ['Latitude' => 10.372164418034014, 'Longitude' => 124.96883374274243],
            'SLSU Multi Species Hatchery near Casao Brgy Road' => ['Latitude' => 10.370903510128185, 'Longitude' => 124.96912009399821],
            'St. Peter Chapels' => ['Latitude' => 10.370726766495, 'Longitude' => 124.96910978549563],
            'Casao Brgy Hall' => ['Latitude' => 10.370222529334898, 'Longitude' => 124.96910785129374],
            'Casao Brgy Road near Arline Store' => ['Latitude' => 10.369775397882739, 'Longitude' => 124.96909351076835],
            'Casao Gymnasium' => ['Latitude' => 10.368831130477218, 'Longitude' => 124.9690611294765],
            'XP Huloglang' => ['Latitude' => 10.369775397882739, 'Longitude' => 124.96909351076835],
            'EJJE Internet Cafe and Ticketing Office' => ['Latitude' => 10.367749960326206, 'Longitude' => 124.96928493009908],
            'Talisay Welcome' => ['Latitude' => 10.36734413627711, 'Longitude' => 124.96956025952024],
            'Near Diverse Minds Montessori School, Inc.' => ['Latitude' => 10.366726982504762, 'Longitude' => 124.96992653602132],
            'Los Marineros(Resort and Fastfood)' => ['Latitude' => 10.366189023865939, 'Longitude' => 124.97020291708198],
            'Benies Store' => ['Latitude' => 10.365966232005263, 'Longitude' => 124.9702517625288],
            'Making bamboo chair/furniture ' => ['Latitude' => 10.364233115689077, 'Longitude' => 124.97068335649455],
            'Near to Bontoc-Libas Provicial Road' => ['Latitude' => 10.363335381910929, 'Longitude' => 124.97080883157368],
            'JADEMAR Coco Lumber and Construction Supply' => ['Latitude' => 10.361988161609036, 'Longitude' => 124.97053152552317],
            'Near PENRO/CENRO Provincial Nursery- Bontoc ENR Station' => ['Latitude' => 10.361179014611745, 'Longitude' => 124.97027385797053],
            'Olayvars Place' => ['Latitude' => 10.360494658761892, 'Longitude' => 124.97002517842404],
            'Talisay Brgy Road' => ['Latitude' => 10.359476171391396, 'Longitude' => 124.96959090437372],
            'Saint Isidore the Laborer Chapel' => ['Latitude' => 10.359201794778977, 'Longitude' => 124.96947824588186],
            'Talisay Brgy Hall' => ['Latitude' => 10.358867052133418, 'Longitude' => 124.96931655000616],
            'Bontoc Poblacion Public Market' => ['Latitude' => 10.356794584379584, 'Longitude' => 124.96947483123976],
            'Bontoc Terminal' => ['Latitude' => 10.356190970055478, 'Longitude' => 124.96979007764685],
            'Aqua ABS' => ['Latitude' => 10.355450022260081, 'Longitude' => 124.9703885700031],
            'Bontoc Gymnasium' => ['Latitude' => 10.354923800561242, 'Longitude' => 124.97074711351046],
            'Sto Nino Parish' => ['Latitude' => 10.35350763323194, 'Longitude' => 124.97099061834892],
            'ASA Philippines Foundation' => ['Latitude' => 10.353195332199617, 'Longitude' => 124.97089004205263],
            'Prycegas' => ['Latitude' => 10.351751276462853, 'Longitude' => 124.97094354197218],
            'Assembly of God' => ['Latitude' => 10.351446357610039, 'Longitude' => 124.97073933679555],
            'A-Power Gas Station' => ['Latitude' => 10.350877871106537, 'Longitude' => 124.97094508031054],
            'Emirates Gas Station/Bontoc Livelihood' => ['Latitude' => 10.349104084280258, 'Longitude' => 124.97090050429873],
            'Holy Child Chapel' => ['Latitude' => 10.347753912158428, 'Longitude' => 124.97035915387862],
            'Christian and Missionarry Alliance Church' => ['Latitude' => 10.347407211989523, 'Longitude' => 124.9694306337207],
            'Sto.Nino Basketballcourt & Pathway to Sto.Nino Cementery' => ['Latitude' => 10.34727402869302, 'Longitude' => 124.9689551065718],
            'Limars Store' => ['Latitude' => 10.346981937817795, 'Longitude' => 124.9662651246341],
            'Bontoc Municipal Police Station' => ['Latitude' => 10.346939480856346, 'Longitude' => 124.96576302447468],
            'Road to Holy Cross Gardens and Yumeya Mountain Resort' => ['Latitude' => 10.346723219770476, 'Longitude' => 124.96532750339635],
            'Divisoria Bridge' => ['Latitude' => 10.343576818016857, 'Longitude' => 124.96387811291258],
            'Divisoria Brgy Public Market' => ['Latitude' => 10.34292955447659, 'Longitude' => 124.96372436447841],
            'M & A mini RTW and Marians Hardware' => ['Latitude' => 10.342353599776454, 'Longitude' => 124.96394457142085],
            'Fias Sizzling House' => ['Latitude' => 10.341867121248885, 'Longitude' => 124.96426092687385],
            'Divisoria Elementary School' => ['Latitude' => 10.340789098777185, 'Longitude' => 124.96495908490228],
            'Bonbon Bridge' => ['Latitude' => 10.336323522288842, 'Longitude' => 124.96770619917761],
            'Road to Union Brgy Hall & JMs Salon' => ['Latitude' => 10.333757354902692, 'Longitude' => 124.97006627838512],
            'Road to  Mauylab and Union Elementary school(Crossing)' => ['Latitude' => 10.33291501261863, 'Longitude' => 124.96997667097085],
            'Union Rice Mill' => ['Latitude' => 10.329116839529123, 'Longitude' => 124.97091800870638],
            'Bontoc - Tomas Opuss Boundary' => ['Latitude' => 10.327144967316535, 'Longitude' => 124.97157434532494],
            'Higosoan Bridge' => ['Latitude' => 10.32615318284253, 'Longitude' => 124.9719240233444]

        ];
    }

    public function up() {
        $coordinates = $this->coordinates;

        Schema::create('landmark', function (Blueprint $table) {
            $table->id();
            $table->string('TO_Municipality');
            $table->string('Barangay');
            $table->string('Landmark');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('icon')->nullable(); // New column for the icon
            $table->timestamps();
        });

        $landmarks = [
            [
                'Landmarks' => [
                    'Dr. Gonzalo Yong Memorial Bus Terminal'
                ],
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'Zone 3',
            ],

            [
                'Landmarks' => [
                    'Palawan',
                    'Divine Rays',
                ],
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'Zone 2',
            ],

            [
                'Landmarks' => [
                    'Cafe Romara near Shell Gas Station',
                    'Syshore',
                ],
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'San Jose',
            ],

            [
                'Landmarks' => [
                    'C-Oil',
                    'ADZ Funeral Services',
                    'Sogod Public Cemetery',
                    'Tampoong Gymnasium',
                    'Tampoong Brgy. Road',
                ],
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'Tampoong',
            ],

            [
                'Landmarks' => [
                    'Malangsa Bridge',
                    'Sta Cruz Elementary School',
                    'ELCANA Water Refilling Station',
                    'Sta Cruz Brgy Road(next ELCANA Water Refilling Station)',
                    'Sta Cruz Brgy Road (Near Sta Cruz Church)',
                    'Sta Cruz Church',
                    'Grace Joy Integrated Farm',
                    'Dodong Amora Funeral Homes',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Sta. Cruz',
            ],

            [
                'Landmarks' => [
                    'SLSU Multi Species Hatchery near Casao Brgy Road',
                    'St. Peter Chapels',
                    'Casao Brgy Hall',
                    'Casao Brgy Road near Arline Store',
                    'Casao Gymnasium',
                    'XP Huloglang',
                    'EJJE Internet Cafe and Ticketing Office',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Casao',
            ],

            [
                'Landmarks' => [
                    'Talisay Welcome',
                    'Near Diverse Minds Montessori School Inc.',
                    'Los Marineros(Resort and Fastfood)',
                    'Benies Store',
                    'Making bamboo chair/furniture ',
                    'Near to Bontoc-Libas Provicial Road',
                    'JADEMAR Coco Lumber and Construction Supply',
                    'Near PENRO/CENRO Provincial Nursery- Bontoc ENR Station',
                    'Olayvars Place',
                    'Talisay Brgy Road',
                    'Saint Isidore the Laborer Chapel',
                    'Talisay Brgy Hall',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Talisay',
            ],

            [
                'Landmarks' => [
                    'Bontoc Poblacion Public Market',
                    'Bontoc Terminal',
                    'Aqua ABS',
                    'Bontoc Gymnasium',
                    'Sto Nino Parish',
                    'ASA Philippines Foundation',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Poblacion',
            ],

            [
                'Landmarks' => [
                    'Prycegas',
                    'Assembly of God',
                    'A-Power Gas Station',
                    'Emirates Gas Station/Bontoc Livelihood',
                    'Holy Child Chapel',
                    'Christian and Missionarry Alliance Church',
                    'Sto.Nino Basketballcourt & Pathway to Sto.Nino Cementery',
                    'Limars Store',
                    'Bontoc Municipal Police Station',
                    'Road to Holy Cross Gardens and Yumeya Mountain Resort',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Santo Niño',
            ],

            [
                'Landmarks' => [
                    'Divisoria Bridge',
                    'Divisoria Brgy Public Market',
                    'M & A mini RTW and Marians Hardware',
                    'Fia Sizzling House',
                    'Divisoria Elementary School',
                    'Bonbon Bridge',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Divisoria',
            ],

            [
                'Landmarks' => [
                    'Road to Union Brgy Hall & JM Salon',
                    'Road to  Mauylab and Union Elementary school(Crossing)',
                    'Union Rice Mill',
                    'Bontoc - Tomas Opuss Boundary',
                ],
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Union',
            ],

            [
                'Landmarks' => [
                    'Higosoan Bridge',
                ],
                'TO_Municipality' => 'Tomas Oppus',
                'Barangay' => 'Higosoan',
            ],
            

        ];

        foreach ($landmarks as $landmarkData) {
            $TO_Municipality = $landmarkData['TO_Municipality'];
            $Barangay = $landmarkData['Barangay'];
            $landmarkNames = $landmarkData['Landmarks'];
    
            foreach ($landmarkNames as $landmark) {
                if (isset($coordinates[$landmark])) {
                    $landmarkEntry = [
                        'TO_Municipality' => $TO_Municipality,
                        'Barangay' => $Barangay,
                        'Landmark' => $landmark,
                        'latitude' => $coordinates[$landmark]['Latitude'],
                        'longitude' => $coordinates[$landmark]['Longitude'],
                        'icon' => '/img/red.png',
                    ];
    
                    DB::table('landmark')->insert($landmarkEntry);
                } else {
                    // Handle the case where the landmark is not found in $coordinates.
                    // You can log an error or take another action here.
                }
            }
        }
        
    }

    public function down()
    {
        Schema::dropIfExists('landmark');
    }
};
