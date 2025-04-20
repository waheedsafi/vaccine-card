<?php

namespace Database\Seeders;

use App\Enums\CheckListEnum;
use App\Enums\CheckListTypeEnum;
use App\Enums\LanguageEnum;
use App\Enums\RoleEnum;
use App\Models\CheckList;
use App\Models\CheckListTrans;
use App\Models\CheckListType;
use App\Models\CheckListTypeTrans;
use Illuminate\Database\Seeder;

class CheckListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->CheckListType();
        $this->financeCheckList();
        $this->epiUserCheckList();
        $this->finaceUserCheckList();
    }

    protected function CheckListType()
    {
        $checklist = CheckListType::create([
            'id' => CheckListTypeEnum::finance,
        ]);
        CheckListTypeTrans::create([
            'value' => "Finance",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::default,
        ]);

        CheckListTypeTrans::create([
            'value' => "امور مالی",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::farsi,
        ]);
        CheckListTypeTrans::create([
            'value' => "مالي چارې",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::pashto,
        ]);
        $checklist = CheckListType::create([
            'id' => CheckListTypeEnum::epi,
        ]);
        CheckListTypeTrans::create([
            'value' => "EPI",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::default,
        ]);

        CheckListTypeTrans::create([
            'value' => "EPI",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::farsi,
        ]);
        CheckListTypeTrans::create([
            'value' => "EPI",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::pashto,
        ]);
    }

    protected function financeCheckList()
    {
        $checklist = CheckList::create([
            'id' => CheckListEnum::reciept,
            'check_list_type_id' => CheckListTypeEnum::finance,
            'acceptable_extensions' => "pdf,jpeg,png,jpg",
            'acceptable_mimes' => "application/pdf,image/jpeg,image/png,image/jpg",
            'accept' => ".pdf,.jpeg,.png,.jpg",
            'description' => "",
            'file_size' => 3048,
            'user_id' => RoleEnum::debugger,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "Receipt",
            'language_name' => LanguageEnum::default,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "رسید",
            'language_name' => LanguageEnum::farsi,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "رسید",
            'language_name' => LanguageEnum::pashto,
        ]);
    }
    protected function epiUserCheckList()
    {
        $checklist = CheckList::create([
            'id' => CheckListEnum::epi_user_letter_of_introduction,
            'check_list_type_id' => CheckListTypeEnum::epi,
            'acceptable_extensions' => "pdf,jpeg,png,jpg",
            'acceptable_mimes' => "application/pdf,image/jpeg,image/png,image/jpg",
            'accept' => ".pdf,.jpeg,.png,.jpg",
            'description' => "",
            'file_size' => 3048,
            'user_id' => RoleEnum::debugger,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "epi letter of introduction",
            'language_name' => LanguageEnum::default,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "epi معرفی نامه",
            'language_name' => LanguageEnum::farsi,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "د تعارف لیک finance",
            'language_name' => LanguageEnum::pashto,
        ]);
    }
    protected function finaceUserCheckList()
    {
        $checklist = CheckList::create([
            'id' => CheckListEnum::finance_user_letter_of_introduction,
            'check_list_type_id' => CheckListTypeEnum::epi,
            'acceptable_extensions' => "pdf,jpeg,png,jpg",
            'acceptable_mimes' => "application/pdf,image/jpeg,image/png,image/jpg",
            'accept' => ".pdf,.jpeg,.png,.jpg",
            'description' => "",
            'file_size' => 3048,
            'user_id' => RoleEnum::debugger,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "finance letter of introduction",
            'language_name' => LanguageEnum::default,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "finance معرفی نامه",
            'language_name' => LanguageEnum::farsi,
        ]);
        CheckListTrans::create([
            'check_list_id' => $checklist->id,
            'value' => "د تعارف لیک finance",
            'language_name' => LanguageEnum::pashto,
        ]);
    }
}
