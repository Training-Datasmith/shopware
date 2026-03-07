<?php declare(strict_types=1);

namespace Shopware\Core\Content\Cms\Events;

use Shopware\Core\Content\Cms\CmsPageCollection;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Event\NestedEvent;
use Shopware\Core\Framework\Event\ShopwareSalesChannelEvent;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\HttpFoundation\Request;

#[Package('discovery')]
class CmsPageLoadedEvent extends NestedEvent implements ShopwareSalesChannelEvent
{
    /**
     * @deprecated tag:v6.8.0 - reason:parameter-type-change - $result type will be changed from `EntityCollection` to `CmsPageCollection`
     */
    public function __construct(
        protected Request $request,
        /* protected CmsPageCollection $result, */
        protected CmsPageCollection $result,
        protected SalesChannelContext $salesChannelContext
    )
    {
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @deprecated tag:v6.8.0 - reason:return-type-change - return type will be changed from `EntityCollection` to `CmsPageCollection`
     *
     * @return CmsPageCollection
     */
    public function getResult(): EntityCollection /* CmsPageCollection */
    {
        return $this->result;
    }

    public function getContext(): Context
    {
        return $this->salesChannelContext->getContext();
    }

    public function getSalesChannelContext(): SalesChannelContext
    {
        return $this->salesChannelContext;
    }
}
