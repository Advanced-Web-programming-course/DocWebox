<?php
echo "<div class='search'>
        <select name='doctor' id='doctor'>
            <option selected hidden>Υπηρεσία</option>
            <option value='thess'>ΠΑΘΟΛΟΓΟΣ</option>
            <option value='ath'>ΨΥΧΟΛΟΓΟΣ</option>
            <option value='lar'>ΓΥΝΑΙΚΟΛΟΓΟΣ</option>
        </select>
        <select name='location' id='location'>
            <option selected hidden>Τοποθεσία</option>
            <option value='thess'>ΘΕΣΣΑΛΟΝΙΚΗ</option>
            <option value='ath'>ΑΘΗΝΑ</option>
            <option value='lar'>ΛΑΡΙΣΣΑ</option>
        </select>
    <a href=''>
        <svg width='36' height='25' viewBox='0 0 36 25' fill='none' xmlns='http://www.w3.org/2000/svg'
            xmlns:xlink='http://www.w3.org/1999/xlink'>
            <rect x='0.781982' width='34.6068' height='25' fill='url(#pattern0)' />
            <defs>
                <pattern id='pattern0' patternContentUnits='objectBoundingBox' width='1' height='1'>
                    <use xlink:href='#image0_23_476' transform='translate(0.1388) scale(0.00802668 0.0111111)' />
                </pattern>
                <image id='image0_23_476' width='90' height='90'
                    xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAAFz0lEQVR4nO2c3YtVVRjGny2oOY5R+dllQRokCmaNldIHURCF6XX9B0pedR0RVEQ1at1KFCQOlBQ0SYiW9KFGd+UkhKBZ2Uxq5JjjDM2vi7WPHMd5195zzt577T2sH8zNOmf2etbDOmu/+33X2lIkEolEIpFIJBKJ1JQkZOfAQkkbJa2TtErS3ZKWSrpV0sL0a5clXZQ0LOlk+veDpK+TJPm3as2NAVgG7ACOAFfpnKvpNV4AloUeV20ANgGfABNdmGsxnl57Y+hxBgN4GPiqBHMtvgQ2hR53ZQArgPeByQpNbmcAWB7ah1IBtgIXAhnczgXg2dB+SAVHHcA8SW9I2j6Da/8h6bCko3IRxSlJ5yWNpp/3Slos6U65qKRP0mOSVuSVJWmnpBeTJJnI+T/1BegFvsg504aBfuDeLvpbD+wERnL2eQDoLXLMlQMsBo7nGOxpYBuwoMC+FwDbgTM5+j8GLC6q70oBeoBvMwY4jpt9pc2o1PCXgLEMLcfL1FEKwDyyl4ufgHsq1LQaOJGh6QAwtypNXZPOUh97gZ4Auhbiwjsfb1WtqyOAZ/DHyO8AcwLqS4A3PfomgS2h9OUC9zDii5N3hdbYAtjt0XmeOudJgA884veGnMlTAebgX0beC61xWnC5C2vJ+JEAa3IWuBh/yNA8SR2TUdgJojEqjC5mCrAGOy17KLS+6wAe8PwEXw6tLwvgVY/++sxqXM53Ok5T4NNeWeDCvrPGGPaH1ifpWmVk3BC5LbS+vOCqO9MxDiwNrc8ncLgJs7kFLmVgJaK2l9XvTMKwrUb7h0mSXClCTBWkBd29xsfWGKshXdusO/a6oOI6ALjPGMtY0F8n8IQh7PdgoroA93h+zhjT42X0mXfpWG+01yv+zEmSJMhVdaaj42KEj7xGrzTajxUlJABHjfZVZXSW12ir85NFCQmApT2o0VYh9JeihATA0n57GZ3lNfpmo/3vooQE4KLRvqiMzvIabdXYRo32JnDJaA9q9GzE2ndSyg7bvEZbM7dZ1eTrsWZuKb/SvEb/Y7TfUpSQAFjagxp9zmi/qyghAbC0/1pGZ3mNrjTmrAhL+6kyOuvW6A1FCQmApX2oUhXtAE8aCZhzQNBzMJ2QkVR6JKSwHuw0qZVwqi1AnzGWcdwBpsLJtXSkyXIrgfR8cXIq4zmj/UiSJJcrVTIV3Omn6Rimhns5LNJf51/GWMLXPvEXZ0urtRUN/uJsKQmlGYO93eBME2Y1riT3mzGGfaH1XQPYaIgEeCW0viyA1zz667OBRpJw5/imYwxYHVqfBbAWO3I6GFrfDeBOwFqbHE9QUnjUDcAi4GdD8yRQzwcv3EFNiwHqt233I4/eem7blSRgOf6N6LtDa2wBvOvROQIsCa3RC/A0zT9aUYtTtZkAb3sGAm4Zqbw4gFuTfcsFNOWwkCQBc3FHyXwMAWsq1LQW+8bXzmfA/Kp0dQ3ukfabjEG1DnSWUvhs05HnQGc7B4CbytJUOLgjysdyDOwsLmdS2FNkavAO7Ce+LBo3s3vJXkZajAC7gPvpIJ+Nu9H14Y62WQmiWpld9Gsk5kp6XdKOGVz7T934GokRuZdWSa7SvlTSHXKvkdgg6VFJec8HIqlfrnT1lOd7g5K2JklyNed1wwNsxh2WDM0IsDnVNB83c300axmRJOA23A3wv3K9NBlgypkU3EsCrAxki2bdIFvgMn6HSja1nYN4chfM1pndAngQ2I9dPOiGcWAfOVOds95sSQKW4N4Yc5iZxbxTmcDN3m10UBmp2uzQr8xcIOkhuaMbK+WiiuVy27V65fSNym1JOysXkQxJ+k7S990WUlMTP5Y/Gvlc0pZGRSN1hNl8g6wb0ewKSc3+NJpdAdHsColmV0g0u0JwcfZghtmDNPmhpi7kNLs/tM5ZQQ6zL9HAPeK1JMPsK9RoH0vj8Zi9J7S2WUdqdn+6XFwB9tC0N/c2CVzNMq7LkUgkEolEIpFIyfwPXDvC8M6NCtsAAAAASUVORK5CYII=' />
            </defs>
        </svg></a>
    </div>"
    ?>