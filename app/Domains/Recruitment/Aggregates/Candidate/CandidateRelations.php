<?php

namespace App\Domains\Recruitment\Aggregates\Candidate;

use App\Domains\Recruitment\Factories\Candidates\CandidateFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

/**
 * @property int id
 * @property string $email
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 */
trait CandidateRelations
{
    /** @use HasFactory<CandidateFactory> */
    use HasFactory, Notifiable;

    protected static function newFactory()
    {
        return CandidateFactory::new();
    }

    protected $fillable = [
        'email',
        'first_name',
        'middle_name',
        'last_name',
    ];

    protected $hidden = [];

    public function delete(): ?bool
    {
        $this->employmentHistories()->delete();

        return parent::delete();
    }

    protected function employmentHistories(): HasMany
    {
        return $this->hasMany(EmploymentHistory::class);
    }
}
