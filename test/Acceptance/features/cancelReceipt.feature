Feature: Process a receipt once a line is added

  Scenario:
    And I place a purchase order for the supplier "15e3e5c6-ebd5-4c7b-ab76-6fd91fbd4f63" and the following lines:
      | product_id                           | quantity_ordered |
      | 56e1bb3a-33cc-4011-987c-d5c355609f1d | 5                |
      | c907a010-1e86-4a15-92c5-b0420c95d3c7 | 7                |
    And I receive a receipt note for this purchase order with lines:
      | product_id                           | quantity_received |
      | 56e1bb3a-33cc-4011-987c-d5c355609f1d | 2                 |
      | c907a010-1e86-4a15-92c5-b0420c95d3c7 | 2                 |
    When I cancel the receipt note
    And the quantity received for product "c907a010-1e86-4a15-92c5-b0420c95d3c7" should be 0
    And the quantity received for product "c907a010-1e86-4a15-92c5-b0420c95d3c7" should be 0

