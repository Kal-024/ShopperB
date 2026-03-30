<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function addAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'starting_price' => 'required|numeric|min:0',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Auction::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'starting_price' => $request->input('starting_price'),
            'current_price' => $request->input('starting_price'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        return response()->json(['message' => 'Auction created successfully'], 201);

    }

    public function getAuctions()
    {
        $auctions = Auction::all();
        if ($auctions->isEmpty()) {
            return response()->json(['message' => 'No auctions found'], 404);
        }

        return response()->json($auctions, 200);
    }

    public function getAuctionById($id)
    {
        $auction = Auction::find($id);
        if (!$auction) {
            return response()->json(['message' => 'Auction not found'], 404);
        }

        return response()->json($auction, 200);
    }

    public function updateAuctionById(Request $request, $id)
    {
        $auction = Auction::find($id);
        if (!$auction) {
            return response()->json(['message' => 'Auction not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'starting_price' => 'sometimes|required|numeric|min:0',
            'current_price' => 'sometimes|required|numeric|min:0',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date|after:start_time',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $auction->update($request->only([
            'title', 'description', 'starting_price', 'current_price', 'start_time', 'end_time'
        ]));

        return response()->json(['message' => 'Auction updated successfully'], 200);
    }

    public function deleteAuctionById($id)
    {
        $auction = Auction::find($id);
        if (!$auction) {
            return response()->json(['message' => 'Auction not found'], 404);
        }

        $auction->delete();
        return response()->json(['message' => 'Auction deleted successfully'], 200);
    }
}
