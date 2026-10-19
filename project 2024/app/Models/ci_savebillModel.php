<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ci_pesertaModel;

class ci_savebillModel extends Model
{
    protected $table = 'savebilling';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'client_id', 'trx_amount', 'jenis', 'customer_name', 'custumer_email', 'custumer_phone', 'virtual_account',
        'trx_id', 'datetime_expired', 'description', 'datetime_created', 'datetime_last_updated',
        'datetime_payment', 'datetime_created_iso8601', 'datetime_last_updated_iso8601', 'datetime_payment_iso8601', 'datetime_expired_iso8601', 'payment_ntb',
        'payment_amount', 'cumulative_payment_amount', 'va_status', 'account_number', 'accounting_flag', 'prefix',
        'type', 'billing_type'
    ];
}
