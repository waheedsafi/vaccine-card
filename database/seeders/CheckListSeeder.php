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
            'id' => CheckListTypeEnum::user_register,
        ]);
        CheckListTypeTrans::create([
            'value' => "User register",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::default,
        ]);

        CheckListTypeTrans::create([
            'value' => "ثبت نام کاربر",
            'check_list_type_id' => $checklist->id,
            'language_name' => LanguageEnum::farsi,
        ]);
        CheckListTypeTrans::create([
            'value' => "د کارونکي نوم لیکنه",
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
    protected function userCheckList()
    {
        $checklist = CheckList::create([
            'id' => CheckListEnum::user_letter_of_introduction,
            'check_list_type_id' => CheckListTypeEnum::user_register,
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
}
