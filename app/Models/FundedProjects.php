<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundedProjects extends Model
{
    use HasFactory;
    protected $table = 'funded_projects';

    //overwriting the default setting to avoid insertion of timestamp to db.
    public $timestamps = false;

    //The primary key associated with the table.
    protected $primaryKey = 'funded_project_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'researcher',
        'role',
        'project',
        'funding_agency',
        'status',
        'amount',
    ];}
