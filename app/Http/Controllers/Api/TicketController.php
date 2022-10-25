<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketCollection;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($type, Request $request)
    {
        if (!in_array($type, ['all', 'processed', 'unprocessed']))
            return $this->error('Invalid ticket type has been requested');

        $tickets = $type != 'all' ? Ticket::with('user')->$type()->paginate(15) : Ticket::with('user')->paginate(15);

        new TicketCollection($tickets);
        return $this->success("Showing $type tickets.", $tickets);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function statistic()
    {
        $result = [];
        foreach (['all', 'processed', 'unprocessed'] as $scope)
            $result[$scope] = Ticket::$scope()->count();

        $result['top_ticket_creator'] = Ticket::with(['user' => function($user) {
            return $user->select('name', 'id');
        }])->groupBy('user_id')
            ->select('user_id',DB::raw('count(user_id) as total'))
            ->orderBy('total', 'desc')
            ->first()->user->name;

        $result['last_updated_at'] = Ticket::orderBy('updated_at','DESC')->first()->updated_at->diffForHumans();
        return $this->success("Showing tickets reports.", $result);
    }

}
