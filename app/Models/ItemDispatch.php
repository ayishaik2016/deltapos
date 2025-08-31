<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemDispatchTransaction;
use App\Traits\FormatsDateInputs;
use App\Traits\FormatTime;
use App\Models\User;
use App\Models\Vehicle;

class ItemDispatch extends Model
{
    use HasFactory;

    use FormatsDateInputs;

    use FormatTime;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'item_dispatch';
    protected $primaryKey = 'id';
    protected $fillable = [
        'prefix_code',
        'count_id',
        'reference_no',
        'transaction_id',
        'transaction_date',
        'vehicle_id',
        'salesman_id',
        'driver_id',
        'note',
    ];

    /**
     * Insert & update User Id's
     * */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
            $model->updated_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    /**
     * Define the relationship between Order and User.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Define the relationship between Order and User.
     *
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    /**
     * Define the relationship between Order and User.
     *
     * @return BelongsTo
     */
    public function salesman(): BelongsTo
    {
        return $this->belongsTo(User::class, 'salesman_id');
    }

    /**
     * Define the relationship between Order and User.
     *
     * @return BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    /**
     * This method calling the Trait FormatsDateInputs
     * @return null or string
     * Use it as formatted_transaction_date
     * */
    public function getFormattedTransactionDateAttribute()
    {
        return $this->toUserDateFormat($this->transaction_date); // Call the trait method
    }

    /**
     * This method calling the Trait FormatTime
     * @return null or string
     * Use it as format_created_time
     * */
    public function getFormatCreatedTimeAttribute()
    {
        return $this->toUserTimeFormat($this->created_at); // Call the trait method
    }

    /**
     * Define the relationship between Item Transaction & Sale Ordeer table.
     *
     * @return HasMany
     */
    public function ItemDispatchTransaction(): HasMany
    {
        return $this->hasMany(ItemDispatchTransaction::class, 'item_dispatch_id');
    }

    public function getTableCode(){
        return $this->id;
    }
}
