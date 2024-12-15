<div class="overflow-x-auto bg-primary rounded-lg p-4 mt-4 shadow-lg">
    <table id="ongoingTable" class="text-white stripe hover row-border order-column">
        <tbody>
            @for ($i = 0; $i < 10; $i++)
            <tr>
                <td>1</td>
                <td>Game Name</td>
                <td>Price</td>
                <td>Category</td>
                <td>Base</td>
                <td>Potrait Image</td>
                <td>Landscape Image</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>