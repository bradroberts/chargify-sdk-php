<?php

/**
 * Copyright 2011 Crucial Web Studio, LLC or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * https://raw.githubusercontent.com/chargely/chargify-sdk-php/master/LICENSE.md
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Crucial\Service\Chargify;

class PaymentProfile extends AbstractEntity
{
    /**
     * Get product details by Chargify ID
     *
     * @param int $profileId
     *
     * @return PaymentProfile
     */
    public function read($profileId)
    {
        $service = $this->getService();

        $response      = $service->request('payment_profiles/' . $profileId, 'GET');
        $responseArray = $this->getResponseArray($response);

        if (!$this->isError()) {
            $this->_data = $responseArray['payment_profile'];
        } else {
            $this->_data = array();
        }

        return $this;
    }
}