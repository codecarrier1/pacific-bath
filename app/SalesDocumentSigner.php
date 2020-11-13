<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\SalesDocumentSigner
 *
 * @property int $id
 * @property int $user_id
 * @property int $lead_id
 * @property int $quote_id
 * @property int $sales_document_id
 * @property string|null $template_id
 * @property string|null $document_type
 * @property string|null $email
 * @property string|null $signature_id
 * @property bool $is_signed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Lead $lead
 * @property-read \App\Quote $quote
 * @property-read \App\SalesDocument $salesDocument
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereIsSigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereQuoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereSalesDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereSignatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesDocumentSigner whereUserId($value)
 * @mixin \Eloquent
 */
class SalesDocumentSigner extends Model
{
    /**
     * Included relations
     *
     * @var array
     */
    protected $with = [
        'lead',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'is_signed',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'quote_id' => 'integer',
        'sales_document_id' => 'integer',
        'is_signed' => 'boolean',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(\App\Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quote(): BelongsTo
    {
        return $this->belongsTo(\App\Quote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salesDocument(): BelongsTo
    {
        return $this->belongsTo(\App\SalesDocument::class);
    }
}
