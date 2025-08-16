<tr>
                                                    <td class="group-name">{{ __('app.dashboard') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="dashboard_group">
                                                        <label for="dashboard_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input dashboard_group_p" type="checkbox" name="permission[dashboard.can.view.widget.cards]" id="dashboard.can.view.widget.cards">
                                                        <label for="dashboard.can.view.widget.cards">{{ __('app.allow_user_to_view_dashboard_widget_cards') }}</label>
                                                        <br>
                                                        <input class="form-check-input dashboard_group_p" type="checkbox" name="permission[dashboard.can.view.sale.vs.purchase.bar.chart]" id="dashboard.can.view.sale.vs.purchase.bar.chart">
                                                        <label for="dashboard.can.view.sale.vs.purchase.bar.chart">{{ __('app.allow_user_to_view_bar_chart_on_dashboard') }}</label>
                                                        <br>
                                                        <input class="form-check-input dashboard_group_p" type="checkbox" name="permission[dashboard.can.view.trending.items.pie.chart]" id="dashboard.can.view.trending.items.pie.chart">
                                                        <label for="dashboard.can.view.trending.items.pie.chart">{{ __('app.allow_user_to_view_trending_items_pie_chart') }}</label>
                                                        <br>
                                                        <input class="form-check-input dashboard_group_p" type="checkbox" name="permission[dashboard.can.view.recent.invoices.table]" id="dashboard.can.view.recent.invoices.table">
                                                        <label for="dashboard.can.view.recent.invoices.table">{{ __('app.allow_user_to_view_recent_invoices_table') }}</label>
                                                        <br>
                                                        <input class="form-check-input dashboard_group_p" type="checkbox" name="permission[dashboard.can.view.self.dashboard.details.only]" id="dashboard.can.view.self.dashboard.details.only">
                                                        <label for="dashboard.can.view.self.dashboard.details.only">{{ __('app.allow_user_to_view_their_own_dashboard_details') }}</label>
                                                        <br>
                                                        <input class="form-check-input dashboard_group_p" type="checkbox" name="permission[dashboard.can.view.low.stock.items.table]" id="dashboard.can.view.low.stock.items.table">
                                                        <label for="dashboard.can.view.low.stock.items.table">{{ __('app.allow_user_to_view_low_stock_items_table') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('user.profile') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="profile_group">
                                                        <label for="profile_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input profile_group_p" type="checkbox" name="permission[profile.edit]" id="profile.edit">
                                                        <label for="profile.edit">{{ __('app.edit') }}</label>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.app_settings') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="app_settings_group">
                                                        <label for="app_settings_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input app_settings_group_p" type="checkbox" name="permission[app.settings.edit]" id="app.settings.edit">
                                                        <label for="app.settings.edit">{{ __('app.edit') }}</label>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.company_settings') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="company_setting_group">
                                                        <label for="company_setting_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input company_setting_group_p" type="checkbox" name="permission[company.edit]" id="company.edit">
                                                        <label for="company.edit">{{ __('app.edit') }}</label>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="group-name">{{ __('user.user') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="user_group">
                                                        <label for="user_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input user_group_p" type="checkbox" name="permission[user.create]" id="user.create">
                                                        <label for="user.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input user_group_p" type="checkbox" name="permission[user.edit]" id="user.edit">
                                                        <label for="user.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input user_group_p" type="checkbox" name="permission[user.view]" id="user.view">
                                                        <label for="user.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input user_group_p" type="checkbox" name="permission[user.delete]" id="user.delete">
                                                        <label for="user.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.roles') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="role_group">
                                                        <label for="role_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input role_group_p" type="checkbox" name="permission[role.create]" id="role.create">
                                                        <label for="role.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input role_group_p" type="checkbox" name="permission[role.edit]" id="role.edit">
                                                        <label for="role.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input role_group_p" type="checkbox" name="permission[role.view]" id="role.view">
                                                        <label for="role.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input role_group_p" type="checkbox" name="permission[role.delete]" id="role.delete">
                                                        <label for="role.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('customer.customers') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="customer_group">
                                                        <label for="customer_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input customer_group_p" type="checkbox" name="permission[customer.create]" id="customer.create">
                                                        <label for="customer.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input customer_group_p" type="checkbox" name="permission[customer.edit]" id="customer.edit">
                                                        <label for="customer.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input customer_group_p" type="checkbox" name="permission[customer.view]" id="customer.view">
                                                        <label for="customer.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input customer_group_p" type="checkbox" name="permission[customer.delete]" id="customer.delete">
                                                        <label for="customer.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('supplier.supplier') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="supplier_group">
                                                        <label for="supplier_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input supplier_group_p" type="checkbox" name="permission[supplier.create]" id="supplier.create">
                                                        <label for="supplier.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input supplier_group_p" type="checkbox" name="permission[supplier.edit]" id="supplier.edit">
                                                        <label for="supplier.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input supplier_group_p" type="checkbox" name="permission[supplier.view]" id="supplier.view">
                                                        <label for="supplier.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input supplier_group_p" type="checkbox" name="permission[supplier.delete]" id="supplier.delete">
                                                        <label for="supplier.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('item.items') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="item_group">
                                                        <label for="item_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.create]" id="item.create">
                                                        <label for="item.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.edit]" id="item.edit">
                                                        <label for="item.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.view]" id="item.view">
                                                        <label for="item.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.delete]" id="item.delete">
                                                        <label for="item.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.category.create]" id="item.category.create">
                                                        <label for="item.category.create">{{ __('item.category.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.category.edit]" id="item.category.edit">
                                                        <label for="item.category.edit">{{ __('item.category.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.category.view]" id="item.category.view">
                                                        <label for="item.category.view">{{ __('item.category.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.category.delete]" id="item.category.delete">
                                                        <label for="item.category.delete">{{ __('item.category.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.brand.create]" id="item.brand.create">
                                                        <label for="item.brand.create">{{ __('item.brand.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.brand.edit]" id="item.brand.edit">
                                                        <label for="item.brand.edit">{{ __('item.brand.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.brand.view]" id="item.brand.view">
                                                        <label for="item.brand.view">{{ __('item.brand.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input item_group_p" type="checkbox" name="permission[item.brand.delete]" id="item.brand.delete">
                                                        <label for="item.brand.delete">{{ __('item.brand.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('unit.unit') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="unit_group">
                                                        <label for="unit_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input unit_group_p" type="checkbox" name="permission[unit.create]" id="unit.create">
                                                        <label for="unit.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input unit_group_p" type="checkbox" name="permission[unit.edit]" id="unit.edit">
                                                        <label for="unit.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input unit_group_p" type="checkbox" name="permission[unit.view]" id="unit.view">
                                                        <label for="unit.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input unit_group_p" type="checkbox" name="permission[unit.delete]" id="unit.delete">
                                                        <label for="unit.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('warehouse.warehouse') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="warehouse_group">
                                                        <label for="warehouse_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input warehouse_group_p" type="checkbox" name="permission[warehouse.create]" id="warehouse.create">
                                                        <label for="warehouse.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input warehouse_group_p" type="checkbox" name="permission[warehouse.edit]" id="warehouse.edit">
                                                        <label for="warehouse.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input warehouse_group_p" type="checkbox" name="permission[warehouse.view]" id="warehouse.view">
                                                        <label for="warehouse.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input warehouse_group_p" type="checkbox" name="permission[warehouse.delete]" id="warehouse.delete">
                                                        <label for="warehouse.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('warehouse.stock_transfer') }}</td>
                                                    <td>
                                                            <input class="form-check-input row-select" type="checkbox" id="stock_transfer_group">
                                                            <label for="stock_transfer_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input stock_transfer_group_p" type="checkbox" name="permission[stock_transfer.create]" id="stock_transfer.create">
                                                        <label for="stock_transfer.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_transfer_group_p" type="checkbox" name="permission[stock_transfer.edit]" id="stock_transfer.edit">
                                                        <label for="stock_transfer.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_transfer_group_p" type="checkbox" name="permission[stock_transfer.view]" id="stock_transfer.view">
                                                        <label for="stock_transfer.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_transfer_group_p" type="checkbox" name="permission[stock_transfer.delete]" id="stock_transfer.delete">
                                                        <label for="stock_transfer.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_transfer_group_p" type="checkbox" name="permission[stock_transfer.can.view.other.users.stock.transfers]" id="stock_transfer.can.view.other.users.stock.transfers">
                                                        <label for="stock_transfer.can.view.other.users.stock.transfers">{{__('warehouse.allow_user_to_view_all_stock_transfer')}}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('warehouse.stock_adjustment') }}</td>
                                                    <td>
                                                            <input class="form-check-input row-select" type="checkbox" id="stock_adjustment_group">
                                                            <label for="stock_adjustment_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input stock_adjustment_group_p" type="checkbox" name="permission[stock_adjustment.create]" id="stock_adjustment.create">
                                                        <label for="stock_adjustment.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_adjustment_group_p" type="checkbox" name="permission[stock_adjustment.edit]" id="stock_adjustment.edit">
                                                        <label for="stock_adjustment.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_adjustment_group_p" type="checkbox" name="permission[stock_adjustment.view]" id="stock_adjustment.view">
                                                        <label for="stock_adjustment.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_adjustment_group_p" type="checkbox" name="permission[stock_adjustment.delete]" id="stock_adjustment.delete">
                                                        <label for="stock_adjustment.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input stock_adjustment_group_p" type="checkbox" name="permission[stock_adjustment.can.view.other.users.stock.adjustments]" id="stock_adjustment.can.view.other.users.stock.adjustments">
                                                        <label for="stock_adjustment.can.view.other.users.stock.adjustments">{{__('warehouse.allow_user_to_view_all_stock_adjustment')}}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('purchase.order.order') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="purchase_order_group">
                                                        <label for="purchase_order_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input purchase_order_group_p" type="checkbox" name="permission[purchase.order.create]" id="purchase.order.create">
                                                        <label for="purchase.order.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_order_group_p" type="checkbox" name="permission[purchase.order.edit]" id="purchase.order.edit">
                                                        <label for="purchase.order.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_order_group_p" type="checkbox" name="permission[purchase.order.view]" id="purchase.order.view">
                                                        <label for="purchase.order.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_order_group_p" type="checkbox" name="permission[purchase.order.delete]" id="purchase.order.delete">
                                                        <label for="purchase.order.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_order_group_p" type="checkbox" name="permission[purchase.order.can.view.other.users.purchase.orders]" id="purchase.order.can.view.other.users.purchase.orders">
                                                        <label for="purchase.order.can.view.other.users.purchase.orders">Allow User to View All Purchase Orders Created By Other Users</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('purchase.bill') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="purchase_bill_group">
                                                        <label for="purchase_bill_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input purchase_bill_group_p" type="checkbox" name="permission[purchase.bill.create]" id="purchase.bill.create">
                                                        <label for="purchase.bill.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_bill_group_p" type="checkbox" name="permission[purchase.bill.edit]" id="purchase.bill.edit">
                                                        <label for="purchase.bill.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_bill_group_p" type="checkbox" name="permission[purchase.bill.view]" id="purchase.bill.view">
                                                        <label for="purchase.bill.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_bill_group_p" type="checkbox" name="permission[purchase.bill.delete]" id="purchase.bill.delete">
                                                        <label for="purchase.bill.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_bill_group_p" type="checkbox" name="permission[purchase.bill.can.view.other.users.purchase.bills]" id="purchase.bill.can.view.other.users.purchase.bills">
                                                        <label for="purchase.bill.can.view.other.users.purchase.bills">{{ __('purchase.allow_user_to_view_all_purchase_bills') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('purchase.return.return') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="purchase_return_group">
                                                        <label for="purchase_return_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input purchase_return_group_p" type="checkbox" name="permission[purchase.return.create]" id="purchase.return.create">
                                                        <label for="purchase.return.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_return_group_p" type="checkbox" name="permission[purchase.return.edit]" id="purchase.return.edit">
                                                        <label for="purchase.return.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_return_group_p" type="checkbox" name="permission[purchase.return.view]" id="purchase.return.view">
                                                        <label for="purchase.return.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_return_group_p" type="checkbox" name="permission[purchase.return.delete]" id="purchase.return.delete">
                                                        <label for="purchase.return.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input purchase_return_group_p" type="checkbox" name="permission[purchase.return.can.view.other.users.purchase.returns]" id="purchase.return.can.view.other.users.purchase.returns">
                                                        <label for="purchase.return.can.view.other.users.purchase.returns">{{ __('purchase.allow_user_to_view_all_purchase_returns') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('sale.quotation.quotation') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="quotation_group">
                                                        <label for="quotation_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input quotation_group_p" type="checkbox" name="permission[sale.quotation.create]" id="sale.quotation.create">
                                                        <label for="sale.quotation.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input quotation_group_p" type="checkbox" name="permission[sale.quotation.edit]" id="sale.quotation.edit">
                                                        <label for="sale.quotation.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input quotation_group_p" type="checkbox" name="permission[sale.quotation.view]" id="sale.quotation.view">
                                                        <label for="sale.quotation.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input quotation_group_p" type="checkbox" name="permission[sale.quotation.delete]" id="sale.quotation.delete">
                                                        <label for="sale.quotation.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input quotation_group_p" type="checkbox" name="permission[sale.quotation.can.view.other.users.sale.quotations]" id="sale.quotation.can.view.other.users.sale.quotations">
                                                        <label for="sale.quotation.can.view.other.users.sale.quotations">{{ __('sale.allow_user_to_view_all_quotations') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('sale.order.order') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="sale_order_group">
                                                        <label for="sale_order_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input sale_order_group_p" type="checkbox" name="permission[sale.order.create]" id="sale.order.create">
                                                        <label for="sale.order.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_order_group_p" type="checkbox" name="permission[sale.order.edit]" id="sale.order.edit">
                                                        <label for="sale.order.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_order_group_p" type="checkbox" name="permission[sale.order.view]" id="sale.order.view">
                                                        <label for="sale.order.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_order_group_p" type="checkbox" name="permission[sale.order.delete]" id="sale.order.delete">
                                                        <label for="sale.order.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_order_group_p" type="checkbox" name="permission[sale.order.can.view.other.users.sale.orders]" id="sale.order.can.view.other.users.sale.orders">
                                                        <label for="sale.order.can.view.other.users.sale.orders">{{ __('sale.allow_user_to_view_all_sale_orders') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('sale.sale_invoice') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="sale_invoice_group">
                                                        <label for="sale_invoice_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input sale_invoice_group_p" type="checkbox" name="permission[sale.invoice.create]" id="sale.invoice.create">
                                                        <label for="sale.invoice.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_invoice_group_p" type="checkbox" name="permission[sale.invoice.edit]" id="sale.invoice.edit">
                                                        <label for="sale.invoice.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_invoice_group_p" type="checkbox" name="permission[sale.invoice.view]" id="sale.invoice.view">
                                                        <label for="sale.invoice.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_invoice_group_p" type="checkbox" name="permission[sale.invoice.delete]" id="sale.invoice.delete">
                                                        <label for="sale.invoice.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_invoice_group_p" type="checkbox" name="permission[sale.invoice.can.view.other.users.sale.invoices]" id="sale.invoice.can.view.other.users.sale.invoices">
                                                        <label for="sale.invoice.can.view.other.users.sale.invoices">{{ __('sale.allow_user_to_view_all_sale_invoices') }}</label>
                                                        <br>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('sale.return.return') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="sale_return_group">
                                                        <label for="sale_return_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input sale_return_group_p" type="checkbox" name="permission[sale.return.create]" id="sale.return.create">
                                                        <label for="sale.return.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_return_group_p" type="checkbox" name="permission[sale.return.edit]" id="sale.return.edit">
                                                        <label for="sale.return.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_return_group_p" type="checkbox" name="permission[sale.return.view]" id="sale.return.view">
                                                        <label for="sale.return.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_return_group_p" type="checkbox" name="permission[sale.return.delete]" id="sale.return.delete">
                                                        <label for="sale.return.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input sale_return_group_p" type="checkbox" name="permission[sale.return.can.view.other.users.sale.returns]" id="sale.return.can.view.other.users.sale.returns">
                                                        <label for="sale.return.can.view.other.users.sale.returns">{{ __('sale.allow_user_to_view_all_sale_returns') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="group-name">{{ __('payment.cash_and_bank_transaction') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="cash_and_bank_transaction_group">
                                                        <label for="cash_and_bank_transaction_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input cash_and_bank_transaction_group_p" type="checkbox" name="permission[transaction.cash.add]" id="transaction.cash.add">
                                                        <label for="transaction.cash.add">{{ __('payment.cash_transaction_create') }}</label>
                                                        <br>
                                                        <input class="form-check-input cash_and_bank_transaction_group_p" type="checkbox" name="permission[transaction.cash.edit]" id="transaction.cash.edit">
                                                        <label for="transaction.cash.edit">{{ __('payment.cash_transaction_edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input cash_and_bank_transaction_group_p" type="checkbox" name="permission[transaction.cash.view]" id="transaction.cash.view">
                                                        <label for="transaction.cash.view">{{ __('payment.cash_transaction_view') }}</label>
                                                        <br>
                                                        <input class="form-check-input cash_and_bank_transaction_group_p" type="checkbox" name="permission[transaction.cash.delete]" id="transaction.cash.delete">
                                                        <label for="transaction.cash.delete">{{ __('payment.cash_transaction_delete') }}</label>
                                                        <br>
                                                        <input class="form-check-input cash_and_bank_transaction_group_p" type="checkbox" name="permission[transaction.bank.view]" id="transaction.bank.view">
                                                        <label for="transaction.bank.view">{{ __('payment.bank_transaction_view') }}</label>
                                                        <br>
                                                        <input class="form-check-input cash_and_bank_transaction_group_p" type="checkbox" name="permission[transaction.cheque.view]" id="transaction.cheque.view">
                                                        <label for="transaction.cheque.view">{{ __('payment.cheque_transaction_view') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('payment.bank_account') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="bank_account_group">
                                                        <label for="bank_account_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input bank_account_group_p" type="checkbox" name="permission[payment.type.create]" id="payment.type.create">
                                                        <label for="payment.type.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input bank_account_group_p" type="checkbox" name="permission[payment.type.edit]" id="payment.type.edit">
                                                        <label for="payment.type.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input bank_account_group_p" type="checkbox" name="permission[payment.type.view]" id="payment.type.view">
                                                        <label for="payment.type.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input bank_account_group_p" type="checkbox" name="permission[payment.type.delete]" id="payment.type.delete">
                                                        <label for="payment.type.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td class="group-name">{{ __('expense.expense') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="expense_group">
                                                        <label for="expense_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.create]" id="expense.create">
                                                            <label for="expense.create">{{ __('app.create') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.edit]" id="expense.edit">
                                                            <label for="expense.edit">{{ __('app.edit') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.view]" id="expense.view">
                                                            <label for="expense.view">{{ __('app.view') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.delete]" id="expense.delete">
                                                            <label for="expense.delete">{{ __('app.delete') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.category.create]" id="expense.category.create">
                                                            <label for="expense.category.create">{{ __('expense.category.create') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.category.edit]" id="expense.category.edit"></input>
                                                            <label for="expense.category.edit">{{ __('expense.category.edit') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.category.view]" id="expense.category.view">
                                                            <label for="expense.category.view">{{ __('expense.category.view') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.category.delete]" id="expense.category.delete">
                                                            <label for="expense.category.delete">{{ __('expense.category.delete') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.can.view.other.users.expenses]" id="expense.can.view.other.users.expenses">
                                                            <label for="expense.can.view.other.users.expenses">{{ __('expense.allow_user_to_view_all_expenses') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.subcategory.create]" id="expense.subcategory.create">
                                                            <label for="expense.subcategory.create">{{ __('expense.subcategory.create') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.subcategory.edit]" id="expense.subcategory.edit">
                                                            <label for="expense.subcategory.edit">{{ __('expense.subcategory.edit') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.subcategory.view]" id="expense.subcategory.view">
                                                            <label for="expense.subcategory.view">{{ __('expense.subcategory.view') }}</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-check-input expense_group_p" type="checkbox" name="permission[expense.subcategory.delete]" id="expense.subcategory.delete">
                                                            <label for="expense.subcategory.delete">{{ __('expense.subcategory.delete') }}</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('tax.tax') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="tax_group">
                                                        <label for="tax_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input tax_group_p" type="checkbox" name="permission[tax.create]" id="tax.create">
                                                        <label for="tax.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input tax_group_p" type="checkbox" name="permission[tax.edit]" id="tax.edit">
                                                        <label for="tax.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input tax_group_p" type="checkbox" name="permission[tax.view]" id="tax.view">
                                                        <label for="tax.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input tax_group_p" type="checkbox" name="permission[tax.delete]" id="tax.delete">
                                                        <label for="tax.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="group-name">{{ __('currency.currency') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="currency_group">
                                                        <label for="currency_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input currency_group_p" type="checkbox" name="permission[currency.create]" id="currency.create">
                                                        <label for="currency.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input currency_group_p" type="checkbox" name="permission[currency.edit]" id="currency.edit">
                                                        <label for="currency.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input currency_group_p" type="checkbox" name="permission[currency.view]" id="currency.view">
                                                        <label for="currency.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input currency_group_p" type="checkbox" name="permission[currency.delete]" id="currency.delete">
                                                        <label for="currency.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('carrier.carrier') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="carrier_group">
                                                        <label for="carrier_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input carrier_group_p" type="checkbox" name="permission[carrier.create]" id="carrier.create">
                                                        <label for="carrier.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input carrier_group_p" type="checkbox" name="permission[carrier.edit]" id="carrier.edit">
                                                        <label for="carrier.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input carrier_group_p" type="checkbox" name="permission[carrier.view]" id="carrier.view">
                                                        <label for="carrier.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input carrier_group_p" type="checkbox" name="permission[carrier.delete]" id="carrier.delete">
                                                        <label for="carrier.delete">{{ __('app.delete') }}</label>
                                                        <br>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.create_and_send_manual_email') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="email_group">
                                                        <label for="email_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input email_group_p" type="checkbox" name="permission[email.create]" id="email.create">
                                                        <label for="email.create">{{ __('app.create') }}</label>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('message.email_template') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="email_template_group">
                                                        <label for="email_template_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input email_template_group_p" type="checkbox" name="permission[email.template.create]" id="email.template.create">
                                                        <label for="email.template.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input email_template_group_p" type="checkbox" name="permission[email.template.edit]" id="email.template.edit">
                                                        <label for="email.template.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input email_template_group_p" type="checkbox" name="permission[email.template.view]" id="email.template.view">
                                                        <label for="email.template.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input email_template_group_p" type="checkbox" name="permission[email.template.delete]" id="email.template.delete">
                                                        <label for="email.template.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.create_and_send_manual_sms') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="sms_group">
                                                        <label for="sms_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input sms_group_p" type="checkbox" name="permission[sms.create]" id="sms.create">
                                                        <label for="sms.create">{{ __('app.create') }}</label>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('message.sms_template') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="sms_template_group">
                                                        <label for="sms_template_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input sms_template_group_p" type="checkbox" name="permission[sms.template.create]" id="sms.template.create">
                                                        <label for="sms.template.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input sms_template_group_p" type="checkbox" name="permission[sms.template.edit]" id="sms.template.edit">
                                                        <label for="sms.template.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input sms_template_group_p" type="checkbox" name="permission[sms.template.view]" id="sms.template.view">
                                                        <label for="sms.template.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input sms_template_group_p" type="checkbox" name="permission[sms.template.delete]" id="sms.template.delete">
                                                        <label for="sms.template.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('language.languages') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="language_group">
                                                        <label for="language_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input language_group_p" type="checkbox" name="permission[language.create]" id="language.create">
                                                        <label for="language.create">{{ __('app.create') }}</label>
                                                        <br>
                                                        <input class="form-check-input language_group_p" type="checkbox" name="permission[language.edit]" id="language.edit">
                                                        <label for="language.edit">{{ __('app.edit') }}</label>
                                                        <br>
                                                        <input class="form-check-input language_group_p" type="checkbox" name="permission[language.view]" id="language.view">
                                                        <label for="language.view">{{ __('app.view') }}</label>
                                                        <br>
                                                        <input class="form-check-input language_group_p" type="checkbox" name="permission[language.delete]" id="language.delete">
                                                        <label for="language.delete">{{ __('app.delete') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.utilities') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="utilities_group">
                                                        <label for="utilities_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input utilities_group_p" type="checkbox" name="permission[import.item]" id="import.item">
                                                        <label for="import.item">{{ __('item.import_items_and_services') }}</label>
                                                        <br>
                                                        <input class="form-check-input utilities_group_p" type="checkbox" name="permission[import.party]" id="import.party">
                                                        <label for="import.party">{{ __('party.import_customers_and_suppliers') }}</label>
                                                        <br>
                                                        <input class="form-check-input utilities_group_p" type="checkbox" name="permission[generate.barcode]" id="generate.barcode">
                                                        <label for="generate.barcode">{{ __('item.generate_barcode') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td class="group-name">{{ __('app.reports') }}</td>

                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="reports_group">
                                                        <label for="reports_group">{{ __('app.select_all') }}</label>
                                                    </td>

                                                    <td>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.profit_and_loss]"
                                                            id="report.profit_and_loss">
                                                        <label for="report.profit_and_loss">{{ __('report.profit_and_loss_report') }}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.item.transaction.batch]"
                                                            id="report.item.transaction.batch">
                                                        <label for="report.item.transaction.batch">{{__('report.batch_wise_item_transaction')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.item.transaction.serial]"
                                                            id="report.item.transaction.serial">
                                                        <label for="report.item.transaction.serial">{{__('report.serial_and_imei_transaction')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.item.transaction.general]"
                                                            id="report.item.transaction.general">
                                                        <label for="report.item.transaction.general">{{__('report.general_item_transaction')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.purchase]"
                                                            id="report.purchase">
                                                        <label for="report.purchase">{{__('report.purchase')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.purchase.item]"
                                                            id="report.purchase.item">
                                                        <label for="report.purchase.item">{{__('report.item_purchase')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.purchase.payment]"
                                                            id="report.purchase.payment">
                                                        <label for="report.purchase.payment">{{__('report.purchase_payment')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.sale]" id="report.sale">
                                                        <label for="report.sale">{{__('report.sale')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.sale.item]"
                                                            id="report.sale.item">
                                                        <label for="report.sale.item">{{__('report.item_sale')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.sale.payment]"
                                                            id="report.sale.payment">
                                                        <label for="report.sale.payment">{{__('report.item_payment')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.expired.item]"
                                                            id="report.expired.item">
                                                        <label for="report.expired.item">{{__('report.expired_item')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.reorder.item]"
                                                            id="report.reorder.item">
                                                        <label for="report.reorder.item">{{__('report.reorder_item')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.expense]" id="report.expense">
                                                        <label for="report.expense">{{__('report.expense')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.expense.item]"
                                                            id="report.expense.item">
                                                        <label for="report.expense.item">{{__('report.item_expense')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.expense.payment]"
                                                            id="report.expense.payment">
                                                        <label for="report.expense.payment">{{__('report.expense_payment')}}</label>
                                                        <br>

                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.transaction.cashflow]" id="report.transaction.cashflow">
                                                        <label for="report.transaction.cashflow">{{__('payment.cash_flow')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.transaction.bank-statement]" id="report.transaction.bank-statement">
                                                        <label for="report.transaction.bank-statement">{{__('payment.bank_statement')}}</label>
                                                        <br>

                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.gstr-1]" id="report.gstr-1">
                                                        <label for="report.gstr-1">{{__('report.gstr-1')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.gstr-2]" id="report.gstr-2">
                                                        <label for="report.gstr-2">{{__('report.gstr-2')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_transfer]"
                                                            id="report.stock_transfer">
                                                        <label for="report.stock_transfer">{{__('report.stock_transfer')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_transfer.item]"
                                                            id="report.stock_transfer.item">
                                                        <label for="report.stock_transfer.item">{{__('report.item_stock_transfer')}}</label>

                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_adjustment]"
                                                            id="report.stock_adjustment">
                                                        <label for="report.stock_adjustment">{{__('warehouse.stock_adjustment')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_adjustment.item]"
                                                            id="report.stock_adjustment.item">
                                                        <label for="report.stock_adjustment.item">{{__('report.item_stock_adjustment')}}</label>

                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.customer.due.payment]"
                                                            id="report.customer.due.payment">
                                                        <label for="report.customer.due.payment">{{__('report.customer_payment_due')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.supplier.due.payment]"
                                                            id="report.supplier.due.payment">
                                                        <label for="report.supplier.due.payment">{{__('report.supplier_payment_due')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_report.item.batch]"
                                                            id="report.stock_report.item.batch">
                                                        <label for="report.stock_report.item.batch">{{__('report.batch_wise_item_stock')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_report.item.serial]"
                                                            id="report.stock_report.item.serial">
                                                        <label for="report.stock_report.item.serial">{{__('report.serial_wise_item_stock')}}</label>
                                                        <br>
                                                        <input class="form-check-input reports_group_p" type="checkbox" name="permission[report.stock_report.item.general]"
                                                            id="report.stock_report.item.general">
                                                        <label for="report.stock_report.item.general">{{__('report.general_item_stock')}}</label>
                                                        <br>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="group-name">{{ __('app.general') }}</td>
                                                    <td>
                                                        <input class="form-check-input row-select" type="checkbox" id="general_group">
                                                        <label for="general_group">{{ __('app.select_all') }}</label>
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input general_group_p" type="checkbox" name="permission[general.allow.to.view.item.purchase.price]" id="general.allow.to.view.item.purchase.price">
                                                        <label for="general.allow.to.view.item.purchase.price">{{ __('purchase.allow_user_to_view_item_purchase_price') }}</label>
                                                        <br>
                                                        <input class="form-check-input general_group_p" type="checkbox" name="permission[general.permission.to.apply.discount.to.sale]" id="general.permission.to.apply.discount.to.sale">
                                                        <label for="general.permission.to.apply.discount.to.sale">{{ __('sale.allow_to_apply_discount') }}</label>
                                                        <br>
                                                        <input class="form-check-input general_group_p" type="checkbox" name="permission[general.permission.to.apply.discount.to.purchase]" id="general.permission.to.apply.discount.to.purchase">
                                                        <label for="general.permission.to.apply.discount.to.purchase">{{ __('purchase.allow_to_apply_discount') }}</label>
                                                        <br>
                                                        <input class="form-check-input general_group_p" type="checkbox" name="permission[general.permission.to.change.sale.price]" id="general.permission.to.change.sale.price">
                                                        <label for="general.permission.to.change.sale.price">{{ __('sale.allow_user_to_change_sale_price') }}</label>
                                                        <br>
                                                    </td>
                                                </tr>
