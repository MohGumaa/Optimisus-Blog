<?php
/**
 * Coins status
 *
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<script>
    fetch("https://api.tokenncoin.com/coins/latest")
    .then(res=> res.json())
    .then(data=> {
        const coinsOutput = document.querySelectorAll(".coins-output");
        let output = "";
        const coins = data.data;

        coins.forEach((coin) => {
            if ( coin.symbol === "BTC" || coin.symbol === "ETH" || coin.symbol === "SOL" || coin.symbol === "TRX" || coin.symbol === "NFT" || coin.symbol === "BNB" || coin.symbol === "USDT" || coin.symbol === "BCH" || coin.symbol === "BSV" || coin.symbol === "LTC" || coin.symbol === "TRC" || coin.symbol === "ADA" || coin.symbol === "DOGE" ) {
                const priceUsd = coin.price_usd ? coin.price_usd.toFixed(2) : 0;
                const changePre24h = coin.change_per_24h.toPrecision(4);

                output += `
                    <div class="coin">
                        <span class="coin__symbol">${coin.symbol}</span>
                        <span class="coin__price">$${priceUsd}</span>
                        <span class="coin__change ${changePre24h > 0 ? 'positive' : 'negative'}">(${changePre24h})</span>
                    </div>
                `;
            }
        });
        coinsOutput.forEach(coinOutput => coinOutput.innerHTML = output);
    })
    .catch(err=> console.log(err))
</script>
<div class="coins__prices">
    <div class="coins coins-output"></div>
    <div class="coins coins-output"></div>
</div>

