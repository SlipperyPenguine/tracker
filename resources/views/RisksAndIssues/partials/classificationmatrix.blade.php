<svg id="svg" width="300" height="300" viewBox="0 0 360 360" xmlns="http://www.w3.org/2000/svg"
     xmlns:xlink="http://www.w3.org/1999/xlink">

    <defs>
        <g id="Prevent">
            <rect x="0" y="0" width="60" height="60" style="fill:red;stroke:#d0d2c1;stroke-width:1" />
            <text x="26" y="34" fill="black">P</text>
        </g>
        <g id="Reduce">
            <rect x="0" y="0" width="60" height="60" style="fill:#ff6810;stroke:#d0d2c1;stroke-width:1" />
            <text x="26" y="34" fill="black">R</text>
        </g>
        <g id="Contingency">
            <rect x="0" y="0" width="60" height="60" style="fill:#ffde37;stroke:#d0d2c1;stroke-width:1" />
            <text x="26" y="34" fill="black">C</text>
        </g>
        <g id="Accept">
            <rect x="0" y="0" width="60" height="60" style="fill:#329034;stroke:#d0d2c1;stroke-width:1" />
            <text x="26" y="34" fill="black">A</text>
        </g>

        <g id="Current">
            <circle cx="30" cy="30" r="15" stroke="black" stroke-width="1" fill="white" />
        </g>

    </defs>

    <use xlink:href="#Contingency" x="60" y="0" />
    <use xlink:href="#Reduce" x="120" y="0" />
    <use xlink:href="#Prevent" x="180" y="0" />
    <use xlink:href="#Prevent" x="240" y="0" />
    <use xlink:href="#Prevent" x="300" y="0" />

    <use xlink:href="#Accept" x="60" y="60" />
    <use xlink:href="#Contingency" x="120" y="60" />
    <use xlink:href="#Reduce" x="180" y="60" />
    <use xlink:href="#Prevent" x="240" y="60" />
    <use xlink:href="#Prevent" x="300" y="60" />

    <use xlink:href="#Accept" x="60" y="120" />
    <use xlink:href="#Contingency" x="120" y="120" />
    <use xlink:href="#Contingency" x="180" y="120" />
    <use xlink:href="#Reduce" x="240" y="120" />
    <use xlink:href="#Prevent" x="300" y="120" />

    <use xlink:href="#Accept" x="60" y="180" />
    <use xlink:href="#Accept" x="120" y="180" />
    <use xlink:href="#Contingency" x="180" y="180" />
    <use xlink:href="#Contingency" x="240" y="180" />
    <use xlink:href="#Reduce" x="300" y="180" />

    <use xlink:href="#Accept" x="60" y="240" />
    <use xlink:href="#Accept" x="120" y="240"/>
    <use xlink:href="#Accept" x="180" y="240" />
    <use xlink:href="#Accept" x="240" y="240" />
    <use xlink:href="#Contingency" x="300" y="240" />

    <use xlink:href="#Current" x="{{(($subject->probability)*60)+60}}" y="{{(($subject->impact)*60)}}" />

</svg>