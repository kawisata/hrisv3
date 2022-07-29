<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('role_user')->delete();

        DB::table('role_user')->insert(array (
            0	 =>	array (	'role_id' =>	3	,'user_id' =>	45544	,'user_type' => 'App\\Models\\User',	),
            1	 =>	array (	'role_id' =>	3	,'user_id' =>	123456	,'user_type' => 'App\\Models\\User',	),
            4	 =>	array (	'role_id' =>	3	,'user_id' =>	11790011	,'user_type' => 'App\\Models\\User',	),
            5	 =>	array (	'role_id' =>	3	,'user_id' =>	12345679	,'user_type' => 'App\\Models\\User',	),
            6	 =>	array (	'role_id' =>	3	,'user_id' =>	19930178	,'user_type' => 'App\\Models\\User',	),
            7	 =>	array (	'role_id' =>	3	,'user_id' =>	46967	,'user_type' => 'App\\Models\\User',	),
            8	 =>	array (	'role_id' =>	3	,'user_id' =>	45374	,'user_type' => 'App\\Models\\User',	),
            9	 =>	array (	'role_id' =>	3	,'user_id' =>	66431	,'user_type' => 'App\\Models\\User',	),
            10	 =>	array (	'role_id' =>	3	,'user_id' =>	52375	,'user_type' => 'App\\Models\\User',	),
            11	 =>	array (	'role_id' =>	3	,'user_id' =>	12750018	,'user_type' => 'App\\Models\\User',	),
            12	 =>	array (	'role_id' =>	3	,'user_id' =>	19930271	,'user_type' => 'App\\Models\\User',	),
            13	 =>	array (	'role_id' =>	3	,'user_id' =>	19930172	,'user_type' => 'App\\Models\\User',	),
            14	 =>	array (	'role_id' =>	3	,'user_id' =>	64213	,'user_type' => 'App\\Models\\User',	),
            15	 =>	array (	'role_id' =>	3	,'user_id' =>	43925	,'user_type' => 'App\\Models\\User',	),
            16	 =>	array (	'role_id' =>	3	,'user_id' =>	63773	,'user_type' => 'App\\Models\\User',	),
            17	 =>	array (	'role_id' =>	3	,'user_id' =>	19930177	,'user_type' => 'App\\Models\\User',	),
            18	 =>	array (	'role_id' =>	3	,'user_id' =>	12880021	,'user_type' => 'App\\Models\\User',	),
            19	 =>	array (	'role_id' =>	3	,'user_id' =>	47145	,'user_type' => 'App\\Models\\User',	),
            20	 =>	array (	'role_id' =>	3	,'user_id' =>	19930284	,'user_type' => 'App\\Models\\User',	),
            21	 =>	array (	'role_id' =>	3	,'user_id' =>	19930272	,'user_type' => 'App\\Models\\User',	),
            22	 =>	array (	'role_id' =>	3	,'user_id' =>	19930275	,'user_type' => 'App\\Models\\User',	),
            23	 =>	array (	'role_id' =>	3	,'user_id' =>	19930286	,'user_type' => 'App\\Models\\User',	),
            24	 =>	array (	'role_id' =>	3	,'user_id' =>	58196	,'user_type' => 'App\\Models\\User',	),
            25	 =>	array (	'role_id' =>	3	,'user_id' =>	19930285	,'user_type' => 'App\\Models\\User',	),
            26	 =>	array (	'role_id' =>	3	,'user_id' =>	42300	,'user_type' => 'App\\Models\\User',	),
            27	 =>	array (	'role_id' =>	3	,'user_id' =>	19930274	,'user_type' => 'App\\Models\\User',	),
            28	 =>	array (	'role_id' =>	3	,'user_id' =>	19930176	,'user_type' => 'App\\Models\\User',	),
            29	 =>	array (	'role_id' =>	3	,'user_id' =>	19930269	,'user_type' => 'App\\Models\\User',	),
            30	 =>	array (	'role_id' =>	3	,'user_id' =>	19930289	,'user_type' => 'App\\Models\\User',	),
            31	 =>	array (	'role_id' =>	3	,'user_id' =>	46565	,'user_type' => 'App\\Models\\User',	),
            32	 =>	array (	'role_id' =>	3	,'user_id' =>	19930276	,'user_type' => 'App\\Models\\User',	),
            33	 =>	array (	'role_id' =>	3	,'user_id' =>	19930251	,'user_type' => 'App\\Models\\User',	),
            34	 =>	array (	'role_id' =>	3	,'user_id' =>	19930252	,'user_type' => 'App\\Models\\User',	),
            35	 =>	array (	'role_id' =>	3	,'user_id' =>	19930281	,'user_type' => 'App\\Models\\User',	),
            36	 =>	array (	'role_id' =>	3	,'user_id' =>	18900136	,'user_type' => 'App\\Models\\User',	),
            37	 =>	array (	'role_id' =>	3	,'user_id' =>	19930282	,'user_type' => 'App\\Models\\User',	),
            38	 =>	array (	'role_id' =>	3	,'user_id' =>	19930283	,'user_type' => 'App\\Models\\User',	),
            39	 =>	array (	'role_id' =>	3	,'user_id' =>	12890019	,'user_type' => 'App\\Models\\User',	),
            40	 =>	array (	'role_id' =>	3	,'user_id' =>	19930266	,'user_type' => 'App\\Models\\User',	),
            41	 =>	array (	'role_id' =>	3	,'user_id' =>	19930270	,'user_type' => 'App\\Models\\User',	),
            42	 =>	array (	'role_id' =>	3	,'user_id' =>	10750004	,'user_type' => 'App\\Models\\User',	),
            43	 =>	array (	'role_id' =>	3	,'user_id' =>	18950137	,'user_type' => 'App\\Models\\User',	),
            44	 =>	array (	'role_id' =>	3	,'user_id' =>	49050	,'user_type' => 'App\\Models\\User',	),
            45	 =>	array (	'role_id' =>	3	,'user_id' =>	18810102	,'user_type' => 'App\\Models\\User',	),
            46	 =>	array (	'role_id' =>	3	,'user_id' =>	43310	,'user_type' => 'App\\Models\\User',	),
            47	 =>	array (	'role_id' =>	3	,'user_id' =>	66464	,'user_type' => 'App\\Models\\User',	),
            48	 =>	array (	'role_id' =>	3	,'user_id' =>	19930279	,'user_type' => 'App\\Models\\User',	),
            49	 =>	array (	'role_id' =>	3	,'user_id' =>	10760005	,'user_type' => 'App\\Models\\User',	),
            50	 =>	array (	'role_id' =>	3	,'user_id' =>	69224	,'user_type' => 'App\\Models\\User',	),
            51	 =>	array (	'role_id' =>	3	,'user_id' =>	46573	,'user_type' => 'App\\Models\\User',	),
            52	 =>	array (	'role_id' =>	3	,'user_id' =>	19930278	,'user_type' => 'App\\Models\\User',	),
            53	 =>	array (	'role_id' =>	3	,'user_id' =>	19930313	,'user_type' => 'App\\Models\\User',	),
            54	 =>	array (	'role_id' =>	3	,'user_id' =>	67754	,'user_type' => 'App\\Models\\User',	),
            55	 =>	array (	'role_id' =>	3	,'user_id' =>	40878	,'user_type' => 'App\\Models\\User',	),
            56	 =>	array (	'role_id' =>	3	,'user_id' =>	45196	,'user_type' => 'App\\Models\\User',	),
            57	 =>	array (	'role_id' =>	3	,'user_id' =>	62340	,'user_type' => 'App\\Models\\User',	),
            58	 =>	array (	'role_id' =>	3	,'user_id' =>	46116	,'user_type' => 'App\\Models\\User',	),
            59	 =>	array (	'role_id' =>	3	,'user_id' =>	50258	,'user_type' => 'App\\Models\\User',	),
            60	 =>	array (	'role_id' =>	3	,'user_id' =>	19930329	,'user_type' => 'App\\Models\\User',	),
            61	 =>	array (	'role_id' =>	3	,'user_id' =>	19930336	,'user_type' => 'App\\Models\\User',	),
            62	 =>	array (	'role_id' =>	3	,'user_id' =>	12860023	,'user_type' => 'App\\Models\\User',	),
            63	 =>	array (	'role_id' =>	3	,'user_id' =>	19930333	,'user_type' => 'App\\Models\\User',	),
            64	 =>	array (	'role_id' =>	3	,'user_id' =>	19930323	,'user_type' => 'App\\Models\\User',	),
            65	 =>	array (	'role_id' =>	3	,'user_id' =>	13850030	,'user_type' => 'App\\Models\\User',	),
            66	 =>	array (	'role_id' =>	3	,'user_id' =>	10760009	,'user_type' => 'App\\Models\\User',	),
            67	 =>	array (	'role_id' =>	3	,'user_id' =>	19930327	,'user_type' => 'App\\Models\\User',	),
            68	 =>	array (	'role_id' =>	3	,'user_id' =>	19930246	,'user_type' => 'App\\Models\\User',	),
            69	 =>	array (	'role_id' =>	3	,'user_id' =>	19930294	,'user_type' => 'App\\Models\\User',	),
            70	 =>	array (	'role_id' =>	3	,'user_id' =>	19930267	,'user_type' => 'App\\Models\\User',	),
            71	 =>	array (	'role_id' =>	3	,'user_id' =>	19650153	,'user_type' => 'App\\Models\\User',	),
            72	 =>	array (	'role_id' =>	3	,'user_id' =>	19930328	,'user_type' => 'App\\Models\\User',	),
            73	 =>	array (	'role_id' =>	1	,'user_id' =>	45544	,'user_type' => 'App\\Models\\User',	),
            74	 =>	array (	'role_id' =>	2	,'user_id' =>	45544	,'user_type' => 'App\\Models\\User',	),
        ));


    }
}
