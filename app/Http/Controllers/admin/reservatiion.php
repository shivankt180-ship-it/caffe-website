<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\reservation as ReservationModel;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class reservatiion extends Controller
{
    public function index(Request $request): View
    {
        $bookingQuery = ReservationModel::query();
        $status = $request->input('status');

        if (in_array($status, ['pending', 'confirmed', 'cancelled'], true)) {
            $bookingQuery->where('status', $status);
        }

        $search = trim((string) $request->input('search', ''));

        if ($search !== '') {
            $bookingQuery->where(function (Builder $query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $bookingCount = (clone $bookingQuery)->count();
        $bookings = $bookingQuery->latest()->paginate(15)->withQueryString();

        return view('admin.reservation.index', [
            'bookings' => $bookings,
            'bookingCount' => $bookingCount,
        ]);
    }

    public function updateStatus(Request $request, ReservationModel $reservation): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,cancelled'],
        ]);

        $reservation->update($validated);

        return redirect()
            ->route('admin.reservations.index')
            ->with('success', 'Booking status updated successfully.');
    }

    public function destroy(ReservationModel $reservation): RedirectResponse
    {
        $reservation->delete();

        return redirect()
            ->route('admin.reservations.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
