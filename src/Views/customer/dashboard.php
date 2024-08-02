<?php component('header') ?>

<div class="min-h-full">
  <?php component('customer-header', $data) ?>

  <main class="-mt-32">
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
      <div class="bg-white rounded-lg p-2">
        <!-- Current Balance Stat -->
        <?php component('current-balance') ?>

        <!-- List of All The Transactions -->
        <div class="px-4 sm:px-6 lg:px-8">
          <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
              <p class="mt-2 text-sm text-gray-700">
                Here's a list of all your transactions which inlcuded
                receiver's name, email, amount and date.
              </p>
            </div>
          </div>
          <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                  <thead>
                    <tr>
                      <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                        Receiver Name
                      </th>
                      <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                        Email
                      </th>
                      <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                        Type
                      </th>
                      <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                        Amount
                      </th>
                      <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                        Date
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    <?php if ($data['transactions']) : ?>
                      <?php foreach ($data['transactions'] as $transaction) : ?>
                        <tr>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            <?php __($transaction->receiver->fullname) ?>
                          </td>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">
                            <?php __($transaction->receiver->email) ?>
                          </td>
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">
                            <?php __($transaction->type) ?>
                          </td>

                          <?php if (($transaction->type == 'deposit' || $transaction->receiver_id == authUser()->id)) : ?>
                            <td class="whitespace-nowrap px-2 py-4 text-sm font-medium text-emerald-600">
                              +$<?php __($transaction->amount) ?>
                            </td>
                          <?php else : ?>
                            <td class="whitespace-nowrap px-2 py-4 text-sm font-medium text-red-600">
                              -$<?php __($transaction->amount) ?>
                            </td>
                          <?php endif ?>

                          <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            <?php __($transaction->created_at) ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <tr>
                        <td class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">No records found!</td>
                      </tr>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

<?php component('footer') ?>