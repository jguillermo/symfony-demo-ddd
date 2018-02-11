<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/9/18
 * Time: 2:37 PM
 */

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine\Helper;

use Misa\Accounting\Application\Helper\PaymentHelperRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\MisaDoctrineRepository;

class PaymentHelperDoctrineRepository extends MisaDoctrineRepository implements PaymentHelperRepository
{

}
