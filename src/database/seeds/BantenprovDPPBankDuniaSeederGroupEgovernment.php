<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\DPPBankDunia\Models\Bantenprov\DPPBankDunia\DPPBankDunia;

class BantenprovDPPBankDuniaSeederDPPBankDunia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $dpp_bank_dunias = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($dpp_bank_dunias as $dpp_bank_dunia) {
            $model = DPPBankDunia::updateOrCreate(
                [
                    'label' => $dpp_bank_dunia->label,
                ],
                [
                    'description' => $dpp_bank_dunia->description,
                ]
            );
            $model->save();
        }
	}
}
