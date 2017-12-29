<?php

namespace Misa\Accounting\Presentation\Provider;

use Misa\Accounting\Domain\Product\Item;
use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Provider\BankDetail\AccountMoney;
use Misa\Accounting\Domain\Provider\BankDetail\AccountType;
use Misa\Accounting\Domain\Provider\BankDetail\Bank;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\Information\Email;
use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Domain\Provider\Product\ProviderProduct;
use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Domain\Provider\Source\Source;
use MisaSdk\Common\Entity\CollectionToArray;
use MisaSdk\Common\Enum\Information\Phone\PhoneType;

/**
 * ListPresentation Class
 *
 * @package Misa\Accounting\Presentation\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListPresentation
{
    use CollectionToArray;


    public function formData($items, $products, $banks, $phones)
    {
        return [
            'phones' => $phones,
            'items' => $this->collectionToArray($items),
            'products' => $this->collectionToArray($products),
            'banks' => $this->collectionToArray($banks),
        ];
    }

    public function serializerEncode(Provider $provider)
    {
        return [
            'id' => $provider->id(),
            'company' => $this->company($provider->source()),
            'contac_name' => $provider->contacName(),
            'phones' => $this->phones($provider->phones()->toArray()),
            'emails' => $this->emails($provider->emails()->toArray()),
            'products' => $this->providerProducts($provider->providerProducts()->toArray()),
            'bankAccounts' => $this->bankAccounts($provider->bankAccounts()->toArray()),
        ];
    }

    protected function company(Source $company)
    {
        return [
                'id' => $company->id(),
                'name' => $company->name(),
                'tradeName' => $company->tradeName(),
                'ubigeo' => $company->ubigeo(),
                'address' => $company->address(),
                'document_number' => $company->dataDocument()->number(),
                'document_type' => $company->dataDocument()->type(),
                'entity_id' => $company->dataEntity()->id(),
                'entity_name' => $company->dataEntity()->name(),
        ];
    }

    /**
     * @param BankAccount[] $bankAccounts
     * @return array
     */
    protected function bankAccounts($bankAccounts)
    {
        $data = [];
        foreach ($bankAccounts as $bankAccount) {
            $data[] = [
                'id' => $bankAccount->id(),
                'type' => $bankAccount->type(),
                'type_label' => AccountType::getLabel($bankAccount->type()),
                'money' => $bankAccount->money(),
                'money_label' => AccountMoney::getLabel($bankAccount->money()),
                'number' => $bankAccount->number()->number(),
                'number_interbank' => $bankAccount->number()->interbank(),
                'bank_id' => $bankAccount->bank()->id(),
                'bank_name' => $bankAccount->bank()->name(),
                'holder_name' => $bankAccount->holderName(),

            ];
        }
        return $data;
    }

    /**
     * @param ProviderProduct[] $providerProducts
     * @return array
     */
    protected function providerProducts($providerProducts)
    {
        $data = [];
        foreach ($providerProducts as $providerProduct) {
            $data[] = [
                'id' => $providerProduct->id(),
                'level' => $providerProduct->level(),
                'product_id' => $providerProduct->product()->id(),
                'product_name' => $providerProduct->product()->name(),
                'item_id' => $providerProduct->product()->item()->id(),
                'item_code' => $providerProduct->product()->item()->code(),
                'item_description' => $providerProduct->product()->item()->description(),
            ];
        }
        return $data;
    }

    /**
     * @param Email[] $emails
     * @return array
     */
    protected function emails($emails)
    {
        $data = [];
        foreach ($emails as $email) {
            $data[] = [
                'id' => $email->id(),
                'email' => $email->email(),
            ];
        }
        return $data;
    }

    /**
     * @param Phone[] $phones
     * @return array
     */
    protected function phones($phones)
    {
        $data = [];
        foreach ($phones as $phone) {
            $data[] = [
                'id' => $phone->id(),
                'number' => $phone->number(),
                'type' => $phone->type(),
                'type_label' => PhoneType::getLabel($phone->type()),
            ];
        }
        return $data;
    }
}
